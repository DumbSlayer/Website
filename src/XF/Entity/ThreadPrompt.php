<?php

namespace XF\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;
use XF\Template\Compiler\Syntax\Str;

/**
 * Class ThreadPrompt
 *
 * @package XF\Entity
 *
 * RELATIONS
 * @property \XF\Entity\ThreadPromptGroup PromptGroup
 * @property \XF\Entity\ForumPrompt[] ForumPrompts
 */
class ThreadPrompt extends AbstractPrompt
{
	protected function getClassIdentifier()
	{
		return 'XF:ThreadPrompt';
	}

	protected static function getContentType()
	{
		return 'thread';
	}

	protected function _postDelete()
	{
		parent::_postDelete();

		$this->repository('XF:ForumPrompt')->removePromptAssociations($this);
	}

	public static function getStructure(Structure $structure)
	{
		self::setupDefaultStructure($structure, 'xf_thread_prompt', 'XF:ThreadPrompt');

		$structure->relations['ForumPrompts'] = [
			'entity' => 'XF:ForumPrompt',
			'type' => self::TO_MANY,
			'conditions' => 'prompt_id'
		];

		return $structure;
	}
}