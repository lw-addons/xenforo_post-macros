<?php

class LiamW_PostMacros_CheckSums
{
	public static function addHashes(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
	{
		$hashes += self::getHashes();
	}

	/**
	 * Generated by my CLI hash generator script.
	 *
	 * @return array
	 */
	public static function getHashes()
	{
		return array(
			'library/LiamW/PostMacros/BbCode/Formatter/Reversible.php' => 'e617d013c11f54bcd3d1f38e562af2bb',
			'library/LiamW/PostMacros/ControllerAdmin/AdminMacros.php' => '9cb91035ae78cf018600b5a738668c63',
			'library/LiamW/PostMacros/ControllerPublic/Macros.php' => 'ee377637bac6084557cd270f1fa6aa8a',
			'library/LiamW/PostMacros/DataWriter/AdminMacros.php' => '64c2a4ec6d2f262c83b14771f348a8a0',
			'library/LiamW/PostMacros/DataWriter/Macros.php' => '1b5a80a6e0e941121d524c2f8685f618',
			'library/LiamW/PostMacros/Extend/ControllerAdmin/Forum.php' => 'a8e9f8055d634ccb3b994de0c02f5546',
			'library/LiamW/PostMacros/Extend/ControllerPublic/Account.php' => 'd582f5869b214d043c76d52331fb23ff',
			'library/LiamW/PostMacros/Extend/ControllerPublic/Forum.php' => '02d14fc407801f59bc02c2a70a80e4d8',
			'library/LiamW/PostMacros/Extend/ControllerPublic/Thread.php' => '92d9183a20edf84448a3e8bd169a9b31',
			'library/LiamW/PostMacros/Extend/DataWriter/Discussion/Thread.php' => 'f91cc285e69009b1c3624287fd6258d9',
			'library/LiamW/PostMacros/Extend/DataWriter/DiscussionMessage/Post.php' => '83556c7ae961241f3c787d7c685a47fa',
			'library/LiamW/PostMacros/Extend/DataWriter/Forum.php' => 'c8424e12e5a126616a7433e1fdbd074f',
			'library/LiamW/PostMacros/Extend/DataWriter/User.php' => '502388847289d694d44146bd064ad184',
			'library/LiamW/PostMacros/Importer/Macros.php' => 'e404b78b9d46f2729772901f33dc699b',
			'library/LiamW/PostMacros/Installer.php' => '7caa8cbf0facb9f189bb3cc8653e1cca',
			'library/LiamW/PostMacros/Listener.php' => 'd5fb2a59feb714aae8a3f8440ebacbce',
			'library/LiamW/PostMacros/Model/Import.php' => '368c0dcdce246ef8b84c72b9adf3dabd',
			'library/LiamW/PostMacros/Model/Macros.php' => '7ce830f7e886cfcc17e4791fab49934e',
			'library/LiamW/PostMacros/Route/Prefix/PostMacros.php' => '3f32c218109df16db5aef192c7680199',
			'library/LiamW/PostMacros/Route/PrefixAdmin/PostMacros.php' => '2bc6de5f0454e0cba8d76ef665b3723f',
			'library/LiamW/PostMacros/TemplateModification.php' => '57dda03f5c7ef4e84620cd5cd9ec7351',
			'library/LiamW/PostMacros/ViewPublic/Create.php' => '7facc7ddbfbaea42d77293934751e1b0',
			'library/LiamW/PostMacros/ViewPublic/Edit.php' => '8a51547e2b19d902bca8933303f68b12',
			'library/LiamW/PostMacros/ViewPublic/Index.php' => '33475be3669058bb291de019c9948c43',
			'library/LiamW/PostMacros/ViewPublic/Preview.php' => '07cfb07579a2d742c0e2ea7425840cf8',
			'library/LiamW/PostMacros/ViewPublic/Use.php' => '4cb77e1ab843f42275b8fa85046a99ee',
		);
	}
}