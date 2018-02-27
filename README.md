# Admission Test Documentation

This Admission Test was design to evaluate how well you know the technologies and concepts we use in our daily 
activities in DevSquad. You will be required to develop a **Task Board Management Application** following the 
instructions given in the following sections.

## Product Vision

The **Task Board Management Application** will allow users define their onw **Task Life Cycle** (adding or removing 
lanes to the Task Board) and use it to manage their tasks using Drag & Drop capabilities.

The application is a simplified version of tools like:  

 * [ZenHub](https://www.zenhub.com/)
 * [Trello](https://trello.com/)

## Technology Stack

 * [Laravel 5.6](https://laravel.com/)
 * [Vue.js 2.x](https://vuejs.org/)
 * [Pusher](https://pusher.com/)

**Note 1**: 
````
Use the "Laravel Way" to implement the features of the application. Remember that we are interested in knowing how much 
you know about the framework and it's features.
````
 
## Requirements
 
 Read the requirements to understand the features. They are written as User Stories. The **Acceptance Criteria** will 
 be used as guidelines when reviewing your delivery.
 
 #### Registration
 
 As a **Visitor**,
 I want to **register providing my email and a password**
 So that **I can become a user of the system**
 
 ##### Acceptance Criteria
 1. - [ ]  The email must be unique.
 1. - [ ]  The email must be verified.
 1. - [ ]  The password must be confirmed.
 1. - [ ]  There must be a link to the **Login Page**.
 1. - [ ]  After registration the user will be redirected to the **Task Board Page**.
 ----
 
 #### Login
 As a **User**,
 I want to **login using my email and password**
 So that **I can access the restrict area of the system**
 
 ##### Acceptance Criteria
 1. - [ ]  After authentication the user must be sent to the **Task Board Page**.
 1. - [ ]  There must be a link to the *Recover Password Page**.
 1. - [ ]  There must be a link to the **Registration Page**.
 ----
 
 #### Recover Password
 As a **User**,
 I want to **be able to recover my password**
 So that **when I forget it, I can create a new one.**
 
 ##### Acceptance Criteria
 1. - [ ]  The form should ask only for the email.
 1. - [ ]  The email must be sent with a link to the **Reset Password Page**.
 ----
 
 #### Reset Password
 As a **User**,
 I want to **be able to reset my password**
 So that **a new password is created for my account.**
 
 ##### Acceptance Criteria
 1. - [ ]  The email must match the same email used in the **Recover Password Page**.
 1. - [ ]  The password must be confirmed.
 1. - [ ]  After reseting the password the user should be sent to the **Task Board Page**.
 ----
 
 #### Task Board
 
 As a **User**,
 I want to **Have a Task Board**
 So that **I can easily create and manage tasks**
 
 ##### Acceptance Criteria
 1. - [ ]  While the email is not verified, a message will be displayed orienting the user on how to verify the email.
 1. - [ ] The default board will have three lanes: To Do, In Progress, Done.
 1. - [ ] The Task Board will contain all tasks from all users.
 1. - [ ] The user will be able to drag and drop tasks from one lane to another.
 1. - [ ] The Task Board must be synchronized among all the user in the system in **real time** without having to refresh the page.
 ----
 
 #### Task Management
 
 As a **User**,
 I want to **create new tasks and modify or remove existing tasks**
 So that **I can manage them using the Task Board**
 
 ##### Acceptance Criteria
 1. - [ ]  When creating a task, the **name** must be required.
 1. - [ ]  New tasks will be added to the first lane to the left of the **Task Board**.
 1. - [ ]  When modifying a task, the **name** will still be required.
 1. - [ ]  Ask the user for a confirmation when removing a task.
 ----
 
 #### Lane Management
 
 As a **User**,
 I want to **create new lanes and remove or modify existing lanes**
 So that **the life cycle of the tasks can be modified**
 
 ##### Acceptance Criteria
 1. - [ ]  When creating a new lane, the **name** of the lane will be required.
 1. - [ ]  When modifying an existing lane, only the **name** will still be required.
 1. - [ ]  The **Task Board** must have at least 1 lane.
 1. - [ ]  New lanes will be added to the right side of the **Task Board**.
 1. - [ ]  The tasks of a removed lane will be sent to the first lane to the left.
 1. - [ ]  Ask the user for a confirmation when removing a task.
 ----
 
 #### Task Assignment
 
 As a **User**,
 I want to **to assign tasks to me or any other user**
 So that **they can see the tasks assigned to them**
 
 ##### Acceptance Criteria
 1. - [ ]  A task can have only one user assigned to it.
 1. - [ ]  There must be a way to remove the assignment from a task.
 
## System Pages
 
 The test is composed of only 5 pages.
 
  1. Registration Page
  1. Login Page
  1. Reset Password Page
  1. Recover Password Page
  1. Task Board Page
 
## Deployment

[TODO please, add the instruction for deploying the application for review.]
