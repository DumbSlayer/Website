<?php

namespace XF\Entity;

use XF\Mvc\Entity\Structure;

/**
 * Class ThreadPrefixGroup
 *
 * @package XF\Entity
 */
class ThreadPrefixGroup extends AbstractPrefixGroup
{
	protected function getClassIdentifier()
	{
		return 'XF:ThreadPrefix';
	}

	protected static function getContentType()
	{
		return 'thread';
	}

	public static function getStructure(Structure $structure)
	{
		self::setupDefaultStructure(
			$structure,
			'xf_thread_prefix_group',
			'XF:ThreadPrefixGroup',
			'XF:ThreadPrefix'
		);

		return $structure;
	}
}