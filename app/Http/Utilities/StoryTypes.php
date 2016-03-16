<?php
namespace emutoday\Http\Utilities;

class StoryTypes
{
	protected static $storytypes = [
		"Basic Story"                                  => "storybasic",
		"News Story"                                   => "storynews",
		"Student Profile"                              => "storystudent",
		"Magazine Story"                               => "storymagazine"
	];

	public static function all()
	{
		return static::$storytypes;
	}

}
