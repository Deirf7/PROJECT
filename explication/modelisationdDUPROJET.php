
Class Project
- projectName: String
- startDate: Date
- endDate: Date
+ getProjectName(): String
+ getStartDate(): Date
+ getEndDate(): Date
+ setProjectName(projectName: String): void
+ setStartDate(startDate: Date): void
+ setEndDate(endDate: Date): void

Class Task
- taskName: String
- dueDate: Date
+ getTaskName(): String
+ getDueDate(): Date
+ setTaskName(taskName: String): void
+ setDueDate(dueDate: Date): void

Class User
- userName: String
- email: String
+ getUserName(): String
+ getEmail(): String
+ setUserName(userName: String): void
+ setEmail(email: String): void


Project "1" -- "*" Task
Task "1" -- "1" User