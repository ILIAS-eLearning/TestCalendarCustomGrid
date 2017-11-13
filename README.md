# TestCalendarCustomGrid

TestCalendarCustomGrid is a plugin to test the "AppointmentCustomGrid" plugin slot. It is only for test purposes.

**Minimum ILIAS Version:**
5.3.0

**Maximum ILIAS Version:**
5.3.999

**Responsible Developer:**
Jesús López Reyes - lopez@leifos.com

**Supported Languages:**
This plugin does not support any language. All text is hardcoded in the php files. 

### Quick Installation Guide
1. Clone this repository inside the directory <ILIAS_directory>/Customizing/global/plugins/Services/Calendar/AppointmentCustomGrid/
   
    _or download the zip file, extract the zip file and then copy the content of the folder inside the directory <ILIAS_directory>/Customizing/global/plugins/Services/Calendar/AppointmentCustomGrid/_   
2. Login to ILIAS with an administrator account (e.g. root)
3. Select **Plugins** from the **Administration** main menu drop down.
4. Search the **TestCalendarCustomGrid** plugin in the list of plugins and choose Activate from the Actions drop down.



### Expected Result

Modifications are visible in the Personal Desktop - Calendar

Depending of the element this plugin add/change the link presentation in this calendars:
 - Day view
 - Week view
 - Month view
 
The plugin also changes the default title and description of the appointments located in the agenda: 
  - List view
 
#### Visible Changes

- Day view:
  - If the appointment is full day:
  the background color of the link is like a light orange (btn-info)
	
  - If appointment is not full day:
   the background color of the link is blue (btn-default)

- Week, Month view:
  - If the appointment is full day and it's created by a Course, the content is completely replaced by the text "Course (modified by plugin TestCalendarCustomGrid)" using 2 font sizes and a light green background color.

  - If the appointment is full day and it's created by a Session, the content is completely replaced by the text "Session (modified by plugin TestCalendarCustomGrid)" using 2 font sizes and orange background color.

  - If the appointment is not full day, the event has this changes:
	- If the event is created by a course a new "course" icon is added
	- If the event is created by a session a new "session" icon is added
	- The event title has background color "light green"
	- The event title is bold and red.
	- The title of the event is: "Title changed by ilTestCalendarGridPlugin"
	- Extra text is added: "*Plugin TestCalendarCustomGrid added this text*"
