<?php

namespace XF\Entity;

use XF\Mvc\Entity\Structure;

/**
 * Class ThreadPrefix
 *
 * @package XF\Entity
 *
 * RELATIONS
 * @property \XF\Entity\ForumPrefix[] ForumPrefixes
 */
class ThreadPrefix extends AbstractPrefix
{
	protected function getClassIdentifier()
	{
		return 'XF:ThreadPrefix';
	}

	protected static function getContentType()
	{
		return 'thread';
	}

	protected function _postDelete()
	{
		parent::_postDelete();

		$this->repository('XF:ForumPrefix')->removePrefixAssociations($this);
	}

	public static function getStructure(Structure $structure)
	{
		self::setupDefaultStructure($structure, 'xf_thread_prefix', 'XF:ThreadPrefix');

		$structure->relations['ForumPrefixes'] = [
			'entity' => 'XF:ForumPrefix',
			'type' => self::TO_MANY,
			'conditions' => 'prefix_id'
		];

		return $structure;
	}
}