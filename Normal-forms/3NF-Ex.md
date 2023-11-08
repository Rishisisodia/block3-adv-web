## Database Normalization Exercises

### Exercise-1

| Book  | Genre    | Author |
| ----- | -------- | ------ |
| Book1 | Science  | Jules  |
| Book2 | Science  | Julse  |
| Book3 | Poetry   | Walt   |
| Book4 | Literary | Leo    |
| Book5 | Science  | Leo    |

| Author | Nationality |
| ------ | ----------- |
| Jules  | French      |
| Jules  | French      |
| Walt   | American    |
| Leo    | Russian     |
| Leo    | Russian     |

### Exercise-2

**Employee Table**

| EMPLOYEE_ID | NAME  | HOME_STATE |
| ----------- | ----- | ---------- |
| E001        | Alice | Michigan   |
| E002        | Bob   | Wyoming    |
| E003        | Alice | Wyoming    |

**Job table**

| JOB_CODE | JOB       |
| -------- | --------- |
| J01      | Chef      |
| J02      | Waiter    |
| J03      | Bartender |

**Employee+Job table**

| EMPLOYEE_ID | JOB_CODE | STATE_CODE |
| ----------- | -------- | ---------- |
| E001        | J01      | 26         |
| E001        | J02      | 26         |
| E002        | J02      | 56         |
| E002        | J03      | 56         |
| E003        | J01      | 56         |

### Exercise-3

| UnitID | StudentID | Date     | TutorID | Topic | Room | Grade | Book       | TutEmail     |
| ------ | --------- | -------- | ------- | ----- | ---- | ----- | ---------- | ------------ |
| U1     | St1       | 23.02.03 | Tut1    | GMT   | 629  | 4.7   | Deumlich   | tut1@fhbb.ch |
| U2     | St1       | 18.11.02 | Tut3    | Gln   | 631  | 5.1   | Zehnder    | tut3@fhbb.ch |
| U1     | St4       | 23.02.03 | Tut1    | GMT   | 629  | 4.3   | Deumlich   | tut1@fhbb.ch |
| U5     | St2       | 05.05.03 | Tut3    | PhF   | 632  | 4.9   | Dümmlers   | tut3@fhbb.ch |
| U4     | St2       | 04.07.03 | Tut5    | AVQ   | 621  | 5.0   | Swiss Topo | tut5@fhbb.ch |

### Answer.
