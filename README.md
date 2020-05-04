# Web
**Web Automation Test**
- Partially Completed Tests to review functionality of the webapp. Needs finalized test cases.
- To test locally, follow these steps...
  - Install Homebrew through your local machine terminal.
  - Install Chromedriver, Selenium, and python to test current code.
  - Run python file and edit as needed.
- https://github.com/SeleniumHQ/selenium used as reference.

# Firebase
**Firebase Rules**
- Rules that ensure that only administrators and authenticated users have access to features
- Validation rules included that do things like:
	- Ensure that user has write access only if already authenticated
	- Verify that email string is less than 30 characters
- Indexing to locate data faster in the database
- Reference - [Firebase Security Rules](https://firebase.google.com/docs/rules "Firebase Docs")

# iOS Application
**Firebase Integration**
 - Uses ```GoogleService-Info.plist``` as an API key to access the Firebase database.
 - References to database fields are made in ```AppDelegate.swift``` and accessed globally via ```AppDelegate.shared().reference```.
 - When accounts are initially made, a field is created in /Students using the user's "AuthId" as a key, which contains information about their name, email, and what classes they are taking (initially an empty list).
 	- Because tutor functionality has not been implemented yet, all accounts created through the app are implicitly "Student" accounts and have their information written to the student part of the database.

**UI and UX**
 - _UI & UX info goes here_

**Authentication**
 - _Authentication info goes here_
 
**Payment**
 - _Payment info goes here_

# Backend
**Tutor Matching**
 - ```SandMatching.py``` script when ran will attempt to match a student with an open session request with a tutor who is available at that time who is offering tutoring for the same class.
 	- References the /Tutors, /Requests, /Students parts of the Firebase database.  Calls ```match()``` to start the matching process, which uses several supporting functions.  For each unmatched request, the program will attempt to reduce the list of possible tutors by filtering out tutors that do not offer the class, and then by tutors that are not available at the same time as the student is.  It will also attempt to match students with high-rated tutors.
	- Note that while this works with the "Tutor" objects in the Firebase database, full tutor account functionality has not been implemented on the iOS side, and no provisioning has yet been made for a rating system.
	- Writes to a logfile ```log.txt``` information about when the script ran, how many matches were made, and the number of outstanding requests.
 - Runs automatically every minute if a cronjob ```* * * * * /path/to/script > /dev/null 2>&1``` is used.  This currently exists for user lhough on delenn.

**Other**
 - ```postRequestCourses.sh``` and ```ParseHTML.py``` make a post request to get raw HTML from a Stetson webpage, which is then processed, mostly by regex, to produce lists of course codes for a given subject.  This information is written to /Classes on the Firebase database.
 	- If future attempts are made to make the project go live, this script should be run every semester to account for changes in what classes are being offered.
 - Backend makes use of a ```sand...###.json``` API key to access the database.
