# About SAND
![logo](https://user-images.githubusercontent.com/13968099/81120417-48a19400-8ef2-11ea-8cf2-99307a1f2107.PNG)

The goal of SAND is to create new oppertunities for students to seek help in their studies from their peers.  Using this application, students can submit a request for tutoring in a class, and eligilbe tutors who can accomadate the students time frame recieve a notification.  Once the tutor accepts, it is between the tutor and the student to work out payment, using the links to venmo provided.  This way, more students can get the help they need to pass their classes in a timely manner and students looking to make a bit of money can do so by helping their peers.
# Web
The website is written in a [laravel](https://laravel.com) framework with PHP as a core programming language. Sand theme is being used throughout the website.

## 1. Features 

This project is all about Students who are looking for tutors to learn from them. Tutors while registering their account can specify which course they would like to teach and their class timings so students can choose from the list of tutors to place a request for tution. 

There are kind of users using this website:

 - Student 
 - Tutor 
 - Admin 
 
 
## 2. Firebase Authentication:

[Firebase Authentication](https://firebase.google.com/docs/auth/?gclid=Cj0KCQjwncT1BRDhARIsAOQF9Ln9y1T0apd3o7l5Df-cNHWVrLbMOzQ6HHNyO-ZmK2xkMCg4slgPfF0aAn5ZEALw_wcB) used as areference


## 3. Development

This website has been developed as listed below:

 - implemented the basic sign in, sign up and logout functionality using Firebase.
 -  Added role based authorisation and security for each role namely student, tutor and admin. Implemented proper redirections based on logged in user.
 -  Created different sign up pages for tutor and student. Created profile pages for tutor and student.
 -  Made Requests Page for Students that will show all the tutors and the option to make request, where student name will be automatically taken from logged in user.
 -  Changed Block to Time Needed
 -  Removed rating in Tutor table
 -  Shown availability time in tutor table
 -  Changed "Availability" to "Class Time" in student's Place Request page
 -  Removed "Time Needed" option from form.
 -  Changed "Time Slot" option to "Class Beginning Time" in form
 -  Moved "Select Tutor" option to top and "Select Course" second in form.
 -  Course dropdown will have Course of selected teacher in dropdown.
 -  "Class Begin Time" will have time of selected teacher in dropdown.
 -  Changed "Existing Tutors" to "Classes"
 -  Changed "Courses" Column to "Course" which will show only one Course.
 
 Tutor Changes:
 - Made Requests page that will show requests came from student to that tutor
 - Shown Tutor Profile Page
Tutor Sign-up Changes
 - Changed ***"Select Available From"*** to ***"Class Time Begin"***
 - Changed ***"Select Available Upto"*** to ***"Class Time End"***
 - Removed Courses Checkbox
 - Added dropdown to select only one of the available course with the option as Other to add a new course
 - Added two fields and enable them if other option is selected for course so a tutor can add a new course. Field names are Course and Title.
 - Added validation to choose either one course or add a course.

		

## 4. Backend

[Firebase](https://firebase.google.com/docs/database) is being used as a backend for this website.

In Firebase at the root level there are following nodes:


 - **roles:** It contains roles assigned to each userid where user having role value as 1 is an admin, 2 is a student and 3 is a tutor.
 
## 5. Codebase

This section will walkthrough the codebase structure for the website:

 - **Controllers**
	 - **DashboardController:** This class controls the security aspects and redirects users to proper pages on successful login or register. It enforces authorization checks and authentication checks throwing unauthorized users back to login or error page.
	 - **StudentController:** This class is used to create, edit or manage students and their profile. It is also used to get students page for admin.
	 - **TutorController:** This class is used to create, edit or manage tutors and their profile. It is also used to get tutors page for admin.
	 - **ProfileController:** This class is used to get role based view profile and edit profile page.
	 -  **RequestController:** This class is used to get Requests page for tutor and admin, Schedule page for Student. It is also used to place a new request from student.
	 - **SubjectController:** It is used to get the Subjects page for Admin and to store courses.
	 -  **Model Classes:** Below are the model classes used in this website to wrap Firebase data:
			 - Course
			 - Location
			 - Roles
			 - Student
			 - Tutor 
			 

 - **resources**
	 - **views:** It contains following views and layouts required for HTML pages:
		- **head.blade.php:** A common blade file to implement header when user is logged in.
		- **nav.blade.php:** A common blade file to implement nav bar when user is logged in.
		- **app.blade.php:** A common blade file for login and sign up screens.
		- **edit_student_ui.blade.php:** A blade file to design edit student profile page.
		- **edit_student.blade.php:** Helper blade file for above blade file.
		- **edit_tutor_ui.blade.php:** A blade file to design edit tutor profile page.
		- **edit_tutor.blade.php:** Helper blade file for above blade file.
		- **error.blade.php:** A blade file to show error pages.
		- **login.blade.php:** A blade file for login page.
		- **logout.blade.php:** A blade file to perform logout and redirect to login page.
		-  **profile_ui.blade.php:** A blade file to show profile page for student and tutor.
		- **profile.blade.php:** Helper blade file for above blade file.
		- **requests_student_ui.blade.php:** A blade file to show request page for student.
		- **requests_student.blade.php:** Helper blade file for above blade file.
		- **requests_tutor_ui.blade.php:** A blade file to show request page for tutor.
		- **requests_tutor.blade.php:** Helper blade file for above blade file.
		- **requests_ui.blade.php:** A blade file to show request page for admin.
		- **requests.blade.php:** Helper blade file for above blade file.
		- **schedule_ui.blade.php:** A blade file to show schedule page for student.
		- **signup_students.blade.php:** A blade file to show sign up page for student.
		- **signup_tutor.blade.php:** A blade file to show sign up page for tutor.
		- **students_ui.blade.php:** A blade file to show students page for admin.
		-  **subjects_ui.blade.php:** A blade file to show subjects page for admin.
		- **subjects.blade.php:** Helper blade file for above blade file.
		- **tutor_ui.blade.php:** A blade file to show tutors page for admin.
		- **tutor.blade.php:** Helper blade file for above blade file.
	 - **routes:** web.php route file contains all the routes being used in the website t.


## 6. Future Enhancements

There are certain areas in the website that can be further improved like in the Admin the functionalities related to add/manage tutors, students, courses or requests can be organised further. In tutor an option can be added where a tutor can teach multiple courses.

- There is an important feature which helps to improve the quality of work by giving reviews/rate for tutors.

 
**Web Automation Test**
- Partially Completed Tests to review functionality of the webapp. Needs finalized test cases.
- To test locally, follow these steps...
  - Install Homebrew through your local machine terminal.
  - Install Chromedriver, Selenium, and python to test current code.
  - Run python file and edit as needed.
- https://github.com/SeleniumHQ/selenium used as reference.

**Theme**
- Creating the theme for The pages:
	 - Home page.
	 - Login page.
	 - Register page.
	 - Classes page.
	 - students profile page.
	 - Tutor profile page.
	 - Schedule page.
	 - Payment page.
	 - Request page.
	 - Student schedule page that shows existing student’s class.
	- I have applied Sand theme on the website.
- Future Work for the theme:
 	- Apply the theme on the website for the schedule page and add a search class window on the home page.

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
- ```UpcomingSessionView.swift``` is the primary screen where students view the matched/unmatched status of their session requests. The logic behind this screen is in ```RequestController.swift```. This screen also displays the current Day and Date in a custom CardView using DateFormatter.
- ```ClassesListView.swift``` is the secondary screen where students view which classes they currently have; they can add classes from this screen (driven by ```AddClasses.swift```) or even make a session request my long-pressing on a class in their list (```MakeRequestView.swift``` is referenced from ```ClassesListView.swift``` to prompt the modal view). 
	- While the application shows a student has removed a class from their “My Classes List,” the change is currently not reflecting to Firebase. There needs to be another class, e.g. ```RemoveClasses.swift```, that tie to ```ClassesListView.swift``` to complete this feature. 
- ```Settings.swift``` is the third screen where the student or tutor can access their profile, payments, and more info about the app. The Settings screen using a NavigationView structure to display three NavigationLinks: Profile, Payments, and About.
- ```AddClasses.swift``` contains both the view and logic for adding classes; the ```AddClasses``` struct is responsible for creating the larger list with different class categories, and the ```AddClassesSub``` struct is for detailing the various class codes for a particular subject area. It also contains the logic for actually appending the class to the user’s list in Firebase (see Firebase Integration for more).
- Future Work: 
	- Display custom images linked to specific class names (i.e. CSCI classes display an image of where CSCI classes are held, etc)
	- Display User Information in the Profile screen such as Display Picture, Username, Password, and add the ability to sign-out
	- Add a Profile System so that Students and Tutors can review each other and submit ratings
	- Add Notifcation system with customized timed alerts based on user preference.

**Authentication**
- The IOS Authentication is driven by  ```LoginPage.swift``` which creates an initial screen allowing the user to sign into the app using an email and password that they have pevious made and has been stored in Firebase Authentication. The logic behind this page is stored within ```LoginPageController.swift```.
    - Reference [Firebase Authenticaion](https://firebase.google.com/docs/auth)
- On the initial login page created by ```LoginPage.swift``` there is a button that allows users to access the sign up form if they have no already made an account which will allow them to make an account and send the appropriate information to Firebase Authentication and to Firebase Database. 
 
**Payment**
 - The Payment screen is accessible through the "Payments" tab on the ```Settings.swift``` view. This screen has two buttons: Paypal and Venmo. Each button leads to a Sign-in page where the User can enter their account information and send the tutor payment through the platform of their choice. 
 - There is no Payment Verification system to check if the Student paid the Tutor in the app. The Tutor will have to verify if the student paid before they begin the tutoring session. 
 - Future Work:
 	- Make Payment Verication System
	- Add more payment options to the Payment screen

# Backend
**Tutor Matching**
 - ```SandMatching.py``` script when ran will attempt to match a student with an open session request with a tutor who is 	available at that time who is offering tutoring for the same class.
 	- References the /Tutors, /Requests, /Students parts of the Firebase database.  Calls ```match()``` to start the 	   matching process, which uses several supporting functions.  For each unmatched request, the program will 		  attempt to reduce the list of possible tutors by filtering out tutors that do not offer the class, and then by 	   tutors that are not available at the same time as the student is.  It will also attempt to match students with 	    high-rated tutors. Once matched firebase should be updated with the matched information i.e. time, location, and 	  	    which class if they searched for multiple.
	- Note that while this works with the "Tutor" objects in the Firebase database, full tutor account functionality has 	       not been implemented on the iOS side, and no provisioning has yet been made for a rating system.
		- We have fake tutors and students in order to test in ```SandMatching.py``` this can be added to and changed 			to test different scenarios and bugs. It is structured in json formatting and may be easier to read if put 		     into a json file to edit and view.
	- Writes to a logfile ```log.txt``` information about when the script ran, how many matches were made, and the number 		of outstanding requests.
 - Runs automatically every minute if a cronjob ```* * * * * /path/to/script > /dev/null 2>&1``` is used.  This currently      	  exists for user lhough on delenn.

**Other**
 - ```postRequestCourses.sh``` and ```ParseHTML.py``` make a post request to get raw HTML from a Stetson webpage, which is then processed, mostly by regex, to produce lists of course codes for a given subject.  This information is written to /Classes on the Firebase database.
 	- If future attempts are made to make the project go live, this script should be run every semester to account for changes in what classes are being offered.
 - Backend makes use of a ```sand...###.json``` API key to access the database.
 
 # Future Work
 **iOS app**
  - Currently there is no provisioning for tutors at all.
  	- Way to in the login page choose if you will be making a tutor or student account.
  	- Being able to have student and tutor accounts.
	- Different views for each account and different permissions.
		- View for tutors to see all classes they want to tutor for and an option to change sessions or times.
		- Way for tutors to add classes as a tutor session.
		- Notiications for both student and tutor that they have been matched.
	- Rating system for tutors performance

 **Backend**
  - Filter and search by time last matched.
  - Test large scale data groups for efficiency.
  - Add matching sessions coming up sooner (prioritize matching people looking for a session in one hour instead of someone 	looking for a session a week from today).
