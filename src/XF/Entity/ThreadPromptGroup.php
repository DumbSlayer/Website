<?php

namespace XF\Entity;

use XF\Mvc\Entity\Structure;

/**
 * Class ThreadPromptGroup
 *
 * @package XF\Entity
 *
 * RELATIONS
 * @property \XF\Entity\ThreadPrompt[] Prompts
 */
class ThreadPromptGroup extends AbstractPromptGroup
{
	protected function getClassIdentifier()
	{
		return 'XF:ThreadPrompt';
	}

	protected static function getContentType()
	{
		return 'thread';
	}

	public static function getStructure(Structure $structure)
	{
		self::setupDefaultStructure(
			$structure,
			'xf_thread_prompt_group',
			'XF:ThreadPromptGroup',
			'XF:ThreadPrompt'
		);

		return $structure;
	}
}