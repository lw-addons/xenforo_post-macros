<?php

class LiamW_PostMacros_ControllerAdmin_AdminMacros extends LiamW_PostMacros_ControllerAdmin_Abstract
{
	public function actionIndex()
	{
		$this->canonicalizeRequestUrl(XenForo_Link::buildAdminLink('post-macros/admin'));

		$page = $this->_input->filterSingle('page', XenForo_Input::UINT);
		$perPage = $this->_getMacrosPerPage();

		$macros = $this->_getMacrosModel()->getAdminMacros(array(), array(
			'order' => 'display_order',
			'page' => $page,
			'perPage' => $perPage
		));

		$viewParams = array(
			'macros' => $macros,
			'totalMacros' => $this->_getMacrosModel()->countAdminMacros(),
			'page' => $page,
			'perPage' => $perPage
		);

		return $this->responseView('LiamW_PostMacros_ViewAdmin_Index', 'postMacros_index', $viewParams);
	}

	public function actionNew()
	{
		$this->canonicalizeRequestUrl(XenForo_Link::buildAdminLink('post-macros/admin/new'));

		return $this->_getMacroAddEditResponse();
	}

	public function actionEdit()
	{
		$macro = $this->_getMacroOrError();

		$this->canonicalizeRequestUrl(XenForo_Link::buildAdminLink('post-macros/admin/edit', $macro));

		return $this->_getMacroAddEditResponse($macro);
	}

	public function actionSave()
	{
		$this->_assertPostOnly();

		$data = $this->_input->filter(array(
			'title' => XenForo_Input::STRING,
			'thread_title' => XenForo_Input::STRING,
			'content' => XenForo_Input::STRING,
			'thread_prefix' => XenForo_Input::UINT,
			'lock_thread' => XenForo_Input::BOOLEAN,
			'authorized_usergroups' => array(
				XenForo_Input::UINT,
				'array' => true
			),
			'display_order' => XenForo_Input::UINT
		));

		$dw = XenForo_DataWriter::create('LiamW_PostMacros_DataWriter_AdminMacros');
		if ($adminMacroId = $this->_input->filterSingle('admin_macro_id', XenForo_Input::UINT))
		{
			$dw->setExistingData($adminMacroId);
		}

		$dw->bulkSet($data);
		$dw->save();

		$lastHash = $this->getLastHash($dw->get('admin_macro_id'));

		return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('post-macros/admin') . $lastHash);
	}

	public function actionDelete()
	{
		$macro = $this->_getMacroOrError();

		if ($this->isConfirmedPost())
		{
			$dw = XenForo_DataWriter::create('LiamW_PostMacros_DataWriter_AdminMacros');
			$dw->setExistingData($macro, true);
			$dw->delete();

			return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('post-macros/admin'));
		}
		else
		{
			$viewParams = array(
				'macro' => $macro
			);

			return $this->responseView('LiamW_PostMacros_ViewAdmin_Delete', 'postMacros_delete_confirm', $viewParams);
		}
	}

	public function actionDisplayOrder()
	{
		$order = $this->_input->filterSingle('order', XenForo_Input::ARRAY_SIMPLE);

		$this->_assertPostOnly();
		$this->_getMacrosModel()->massUpdateAdminMacroDisplayOrder($order);

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('post-macros/admin')
		);
	}

	protected function _getMacroOrError($adminMacroId = null)
	{
		if (!$adminMacroId)
		{
			$adminMacroId = $this->_input->filterSingle('admin_macro_id', XenForo_Input::UINT);
		}

		$macro = $this->_getMacrosModel()->getAdminMacroById($adminMacroId);

		if (!$macro)
		{
			throw $this->responseException($this->responseError(new XenForo_Phrase('liam_postMacros_requested_macro_not_found'),
				404));
		}

		return $macro;
	}

	protected function _getMacroAddEditResponse($macro = null)
	{
		$visitor = XenForo_Visitor::getInstance();

		/** @var XenForo_Model_ThreadPrefix $threadPrefixModel */
		$threadPrefixModel = XenForo_Model::create('XenForo_Model_ThreadPrefix');

		$viewParams = array(
			'macro' => $macro,
			'userGroups' => XenForo_Model::create('XenForo_Model_UserGroup')
				->getUserGroupOptions(@unserialize($macro['authorized_usergroups'])),
			'canCreateStaffMacro' => $visitor->hasPermission('liam_postMacros', 'liamMacros_createStaff'),
			'canLockThread' => $visitor->hasPermission('forum', 'lockUnlockThread'),
			'canEditThread' => $visitor->hasPermission('forum', 'editAnyPost'),
			'threadPrefixes' => $threadPrefixModel->getPrefixOptions()
		);

		if ($macro)
		{
			return $this->responseView('LiamW_PostMacros_ViewAdmin_Edit', 'postMacros_edit', $viewParams);
		}
		else
		{
			return $this->responseView('LiamW_PostMacros_ViewAdmin_Create', 'postMacros_edit', $viewParams);
		}
	}
}