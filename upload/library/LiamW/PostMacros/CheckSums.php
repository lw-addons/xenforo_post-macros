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
			'library/LiamW/PostMacros/ControllerAdmin/Abstract.php' => '42958daa8e2b24f87a893bedbda8e40f',
			'library/LiamW/PostMacros/ControllerAdmin/AdminMacros.php' => '0948d97669d8750abfca723185c1aa00',
			'library/LiamW/PostMacros/ControllerAdmin/UserMacros.php' => '08ea9755f1adbb51ea69d2987d91988f',
			'library/LiamW/PostMacros/ControllerPublic/Macros.php' => '4c29f8355366ec75e15ca591e9ac5bf3',
			'library/LiamW/PostMacros/DataWriter/AdminMacros.php' => '7ef626371aef654aa7a650ca2bcb3fc9',
			'library/LiamW/PostMacros/DataWriter/Macros.php' => '1b5a80a6e0e941121d524c2f8685f618',
			'library/LiamW/PostMacros/Extend/ControllerAdmin/Forum.php' => 'a8e9f8055d634ccb3b994de0c02f5546',
			'library/LiamW/PostMacros/Extend/ControllerPublic/Account.php' => 'a6b31c29e5ff411e66d6f5358e6b7e89',
			'library/LiamW/PostMacros/Extend/ControllerPublic/Editor.php' => 'bbe5e5a1bee1d435dcb94e47ca690e4b',
			'library/LiamW/PostMacros/Extend/ControllerPublic/Forum.php' => '02d14fc407801f59bc02c2a70a80e4d8',
			'library/LiamW/PostMacros/Extend/ControllerPublic/Thread.php' => '92d9183a20edf84448a3e8bd169a9b31',
			'library/LiamW/PostMacros/Extend/DataWriter/Discussion/Thread.php' => 'f91cc285e69009b1c3624287fd6258d9',
			'library/LiamW/PostMacros/Extend/DataWriter/DiscussionMessage/Post.php' => '83556c7ae961241f3c787d7c685a47fa',
			'library/LiamW/PostMacros/Extend/DataWriter/Forum.php' => 'c8424e12e5a126616a7433e1fdbd074f',
			'library/LiamW/PostMacros/Extend/DataWriter/User.php' => '40fbd8e6e79cd4cc4c28008d90803438',
			'library/LiamW/PostMacros/Extend/ViewPublic/Editor/Dialog.php' => '172f93900879f119ef42effbe5b7f35e',
			'library/LiamW/PostMacros/Importer/Macros.php' => 'e404b78b9d46f2729772901f33dc699b',
			'library/LiamW/PostMacros/Installer.php' => '7e396ca2c073e50e38484d9fdc5fc8b5',
			'library/LiamW/PostMacros/Listener.php' => '3f64d25c826974552e55491df05c538b',
			'library/LiamW/PostMacros/Model/Import.php' => '368c0dcdce246ef8b84c72b9adf3dabd',
			'library/LiamW/PostMacros/Model/Macros.php' => '2b5980336487d3a6bfd6b9d5a103a09e',
			'library/LiamW/PostMacros/Option/SelectorMode.php' => 'eca81fae39fe40043a5a8b8cdc8b98ed',
			'library/LiamW/PostMacros/Route/Prefix/PostMacros.php' => '3f32c218109df16db5aef192c7680199',
			'library/LiamW/PostMacros/Route/PrefixAdmin/PostMacros.php' => '271d14a8afd30a75eeea57cd4b4666d8',
			'library/LiamW/PostMacros/TemplateModification.php' => '57dda03f5c7ef4e84620cd5cd9ec7351',
			'library/LiamW/PostMacros/ViewPublic/Create.php' => '7facc7ddbfbaea42d77293934751e1b0',
			'library/LiamW/PostMacros/ViewPublic/Edit.php' => '8a51547e2b19d902bca8933303f68b12',
			'library/LiamW/PostMacros/ViewPublic/Expand.php' => '2cb8b10eaa8c02a03505c61723b960fa',
			'library/LiamW/PostMacros/ViewPublic/Index.php' => '1b62e8c580d60ea7304391012d2b60fd',
			'library/LiamW/PostMacros/ViewPublic/Preview.php' => '3f4c48771bad01959153ab6fb972e25a',
			'library/LiamW/PostMacros/ViewPublic/Use.php' => '3e0f5211df8703426b2de9063b3448d3',
			'js/postmacros/macros.js' => '4515cced099f8c7dc4f1a2f901957dcb',
			'js/postmacros/macros.min.js' => '7015aaed42aea1d28d4463f7e180b0fd',
			'js/postmacros/macros_editor.js' => '9042b6988deb828a10530ebfeb3205e2',
			'js/postmacros/macros_editor.min.js' => 'd44340548a0c5d0d0cf033a0eac91301',
		);
	}
}