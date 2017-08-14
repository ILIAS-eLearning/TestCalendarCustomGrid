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

	/**
	 * Replace the whole appointment presentation in the grid.
	 * @return mixed string or empty.
	 */
	public function replaceContent()
	{
		//return "<p style='font-size:90%;'>[PLUGIN] Content replaced.</p>";
		return;
	}

	/**
	 * @return string or empty.
	 */
	public function addExtraContent()
	{
		return "<p style='font-size:90%;'>[PLUGIN] Content added.</p>";
	}

	//this method should return only the path.
	public function addGlyph()
	{
		$appointment = $this->getAppointment();
		$icon = false;

		$cat_id = ilCalendarCategoryAssignments::_lookupCategory($appointment->getEntryId());
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

	//Agenda Methods
	/**
	 * @return \ILIAS\UI\Component\Item\Item $a_item
	 */
	public function editAgendaItem($shy, $properties, $color)
	{
		global $DIC;

		$f = $DIC->ui()->factory();
		$df = new \ILIAS\Data\Factory();

		//example dealing with calendar types.
		$cat_id = ilCalendarCategoryAssignments::_lookupCategory($this->appointment->getEntryId());
		$cat = ilCalendarCategory::getInstanceByCategoryId($cat_id);
		if(ilObject::_lookupType($cat->getObjId()) == "sess") {
			$description_color = "blue";
		}
		else {
			$description_color = "orange";
		}
		//example dealing with appointment properties.
		if($this->appointment->isFullday()) {
			$description = "<span style='color:".$description_color."'>[PLUGIN] This appointment is FULL DAY   - ".$this->appointment->getDescription()."</span>";
			$properties["metadata by PLUGIN"] = "<h3>This text exists because the plugin knows that this is a full day event</h3>";
		} else {
			$description = "<span style='color:$description_color'>[PLUGIN] This appointment is NOT full day  - ".$this->appointment->getDescription()."</span>";
		}

		$li = $f->item()->standard($shy)
			->withDescription("".$description)
			->withLeadText(ilDatePresentation::formatPeriod($this->start_date, $this->appointment->getEnd(), true))
			->withProperties($properties)
			->withColor($df->color('#'.$color));

		return $li;
	}

	public function editShyButtonTitle()
	{
		return "[PLUGIN]changed this title.";
	}

}