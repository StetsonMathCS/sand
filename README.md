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

**Firebase Structure**
- Contains nodes /Classes, /Requests, /Students, and /Tutors.
	- Classes contains information about what classes are offered at Stetson University, generated from ParseHTML.py script.
	- Students and Tutors nodes contain relevant information about those types of accounts.  Student nodes contain their name, email, and what classes they are enrolled in.  Tutor nodes contain information about what classes they are offering, what their rating is, and at what times they are offering tutoring.
		- Note that tutor accounts have not yet been fully implemented.
	- When requests are submitted by students, they appear at and are listened to in the Requests part of the database.  Requests contain an identification for the student that submitted them, whether the student is looking for a group session, what class they are looking to be tutored in, and at what times they are available.  The values for "time" and "tutorLocation" initially left empty, and "matched" is initialized to false.  When a match is made, these are updated appropriately.

# iOS Application
**Firebase Integration**
 - Uses ```GoogleService-Info.plist``` as an API key to access the Firebase database.
 - References to database fields are made in ```AppDelegate.swift``` and accessed globally via ```AppDelegate.shared().reference```.
 - When accounts are initially made, a field is created in /Students using the user's "AuthId" as a key, which contains information about their name, email, and what classes they are taking (initially an empty list).
 	- Because tutor functionality has not been implemented yet, all accounts created through the app are implicitly "Student" accounts and have their information written to the student part of the database.
- ```RequestController.swift``` uses ```AppDelegate.shared()``` to poll firebase for live status updates of whether classes are matched or not; these changes are reflected in ```UpcomingSessionView.swift```.
- ```ClassesListController.swift``` uses ```AppDelegate.shared()``` to draw from a specific student’s record and compile a list of classes, which is displayed in ```ClassesListView.swift```.
- ```AddClasses.swift``` uses ```AppDelegate.shared()``` to compare the student’s existing class list with the class they are trying to add, and append it to their list if it is not already in the list; the UI demonstrating this logic is also in ```AddClasses.swift```.


**UI and UX**
- The iOS UI is primarily driven by SwiftUI from ```ViewController.swift```. It uses a basic TabView structure to switch between the various screens. This is initialized in ```SceneDelegate.swift``` with the declaration of ```contentView```. 
- ```UpcomingSessionView.swift``` is the primary screen where students view the matched/unmatched status of their session requests. The logic behind this screen is in ```RequestController.swift```.
- ```ClassesListView.swift``` is the secondary screen where students view which classes they currently have; they can add classes from this screen (driven by ```AddClasses.swift```) or even make a session request my long-pressing on a class in their list (```MakeRequestView.swift``` is referenced from ```ClassesListView.swift``` to prompt the modal view). 
	- While the application shows a student has removed a class from their “My Classes List,” the change is currently not reflecting to Firebase. There needs to be another class, e.g. ```RemoveClasses.swift```, that tie to ```ClassesListView.swift``` to complete this feature. 
- ```AddClasses.swift``` contains both the view and logic for adding classes; the ```AddClasses``` struct is responsible for creating the larger list with different class categories, and the ```AddClassesSub``` struct is for detailing the various class codes for a particular subject area. It also contains the logic for actually appending the class to the user’s list in Firebase (see Firebase Integration for more).

**Authentication**
- The IOS Authenticaion is driven by  ```LoginPage.swift``` which creates an initial screen allowing the user to sign into the app using an email and password that they have pevious made and has been stored in Firebase Authentication. The logic behind this page is stored within ```LoginPageController.swift```.
    - Reference [Firebase Authenticaion](https://firebase.google.com/docs/auth)
- On the initial login page there is a button that allows users to access the sign up form if they have no already made an account which will allow them to make an account and send the appropriate information to Firebase Authentication and to Firebase Database. 
 
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