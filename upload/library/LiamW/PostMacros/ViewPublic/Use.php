<?php

class LiamW_PostMacros_ViewPublic_Use extends XenForo_ViewPublic_Base
{
	public function renderJson()
	{
		$macro = $this->_compileVariables($this->_params['macro'], $this->_params['thread'], $this->_params['forum']);

		$macroContent = $macro['content'];

		if ($this->_params['render'])
		{
			$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('Wysiwyg',
				array(
					'view' => $this
				)));
			$macroContent = new XenForo_BbCode_TextWrapper($macroContent, $bbCodeParser);
		}

		$output = array(
			'macroContent' => $macroContent,
			'threadTitle' => $macro['thread_title'],
			'threadPrefix' => $macro['thread_prefix'],
			'lockThread' => $macro['lock_thread']
		);

		return XenForo_ViewRenderer_Json::jsonEncodeForOutput($output, false);
	}

	protected function _compileVariables($macro, array $thread, array $forum)
	{
		$threadUser = isset($thread['username']) ? $thread['username'] : '';
		$threadName = isset($thread['title']) ? $thread['title'] : '';
		$forumName = isset($forum['title']) ? $forum['title'] : '';

		$macro['content'] = strtr($macro['content'], array(
			"{threadcreator}" => $threadUser,
			"{threadtitle}" => $threadName,
			"{forumtitle}" => $forumName
		));

		return $macro;
	}

}