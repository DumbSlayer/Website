<?php

namespace XF\Entity;

use XF\Mvc\Entity\Structure;

/**
 * Class ThreadField
 *
 * @package XF\Entity
 *
 * RELATIONS
 * @property \XF\Entity\ForumField[] ForumFields
 */
class ThreadField extends AbstractField
{
	protected function getClassIdentifier()
	{
		return 'XF:ThreadField';
	}

	protected static function getPhrasePrefix()
	{
		return 'thread_field';
	}

	protected function _postDelete()
	{
		parent::_postDelete();

		/** @var \XF\Repository\ForumField $repo */
		$repo = $this->repository('XF:ForumField');
		$repo->removeFieldAssociations($this);

		$this->db()->delete('xf_thread_field_value', 'field_id = ?', $this->field_id);
	}

	public static function getStructure(Structure $structure)
	{
		self::setupDefaultStructure(
			$structure,
			'xf_thread_field',
			'XF:ThreadField',
			[
				'groups' => ['before', 'after', 'thread_status'],
				'has_user_group_editable' => true,
			]
		);

		$structure->relations['ForumFields'] = [
			'entity' => 'XF:ForumField',
			'type' => self::TO_MANY,
			'conditions' => 'field_id'
		];

		return $structure;
	}
}