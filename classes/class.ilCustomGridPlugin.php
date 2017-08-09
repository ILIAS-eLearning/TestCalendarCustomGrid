<?php
include_once("./Services/Calendar/classes/class.ilAppointmentCustomGridPlugin.php");
/***
 *
 * Dummy plugin for testing purposes.
 *
 * @author Jesús López Reyes <lopez@leifos.com>
 * @version $Id$
 */
class ilCustomGridPlugin extends ilAppointmentCustomGridPlugin
{

	/**
	 * @return	string	Plugin Name
	 */
	final function getPluginName()
	{
		return "CustomGrid";
	}

	public function replaceContent()
	{
		//return "<p style='font-size:90%;'>[PLUGIN] Content replaced.</p>";
		return;
	}

	public function addExtraContent()
	{
		return "<p style='font-size:90%;'>[PLUGIN] Content added.</p>";
	}

	//TODO this method should return only the path.
	public function addGlyph()
	{
		$appointment = $this->getAppointment();
		$icon = false;

		$cat_id = ilCalendarCategoryAssignments::_lookupCategory($appointment['event']->getEntryId());
		$cat = ilCalendarCategory::getInstanceByCategoryId($cat_id);
		$cat_info["type"] = $cat->getType();
		$cat_info["obj_id"] = $cat->getObjId();

		if($cat_info['type'] == ilCalendarCategory::TYPE_OBJ)
		{
			$obj_type = ilObject::_lookupType($cat_info["obj_id"]);
			switch ($obj_type)
			{
				case "crs":
					$icon = ilUtil::getImagePath("icon_crss.svg");
					break;
				case "grp":
					$icon = ilUtil::getImagePath("icon_grps.svg");
					break;
				case "sess":
					$icon = ilUtil::getImagePath("icon_sess.svg");
					break;
			}
		}
		if($icon)
		{
			return "<img src=$icon border='0'>";
		}
		else
		{
			return;
		}

	}

	public function replaceTitle()
	{
		return "[Plugin] Title changed by plugin";
	}

	public  function replaceDescription()
	{
		return "[Plugin] Description changed by plugin";
	}

}