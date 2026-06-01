-- ============================================
-- DRS Database Sample Data
-- ============================================

USE DRS_Database;

-- ============================================
-- INSERT COMMANDS
-- ============================================

-- PROFESSOR
INSERT INTO Professor (Fname, Minitial, Lname, Email, Department, BDay) VALUES
('John', 'A', 'Smith', 'jsmith@uw.edu', 'Computer Science', '1975-03-15'),
('Mary', 'B', 'Johnson', 'mjohnson@uw.edu', 'Mathematics', '1980-07-22'),
('Robert', 'C', 'Williams', 'rwilliams@uw.edu', 'Biology', '1968-11-05'),
('Linda', 'D', 'Brown', 'lbrown@uw.edu', 'History', '1972-09-30');

-- STUDENT
INSERT INTO Student (Fname, Minitial, Lname, Email, Status, BDay) VALUES
('Alice', 'C', 'Brown', 'abrown@uw.edu', 'Full-time', '2002-05-10'),
('Bob', 'D', 'Davis', 'bdavis@uw.edu', 'Part-time', '2001-11-30'),
('Carlos', 'E', 'Martinez', 'cmartinez@uw.edu', 'Full-time', '2003-02-14'),
('Diana', 'F', 'Lee', 'dlee@uw.edu', 'Full-time', '2002-08-19'),
('Ethan', 'G', 'Wilson', 'ewilson@uw.edu', 'Part-time', '2000-12-01');

-- EMPLOYEE
INSERT INTO Employee (Fname, Minitial, Lname, Email, Department, Bday) VALUES
('Sara', 'E', 'Wilson', 'swilson@uw.edu', 'Disability Services', '1985-09-01'),
('Tom', 'F', 'Moore', 'tmoore@uw.edu', 'Disability Services', '1990-04-18'),
('Nancy', 'G', 'Taylor', 'ntaylor@uw.edu', 'Disability Services', '1988-06-25'),
('Kevin', 'H', 'Anderson', 'kanderson@uw.edu', 'Exam Services', '1983-01-12');

-- CLASS
INSERT INTO Class (ProfessorID, CourseName, LearningFormat, Quarter, Exam) VALUES
(1, 'Introduction to Databases', 'In-Person', 'Fall 2026', true),
(1, 'Data Structures', 'Hybrid', 'Fall 2026', true),
(2, 'Calculus I', 'In-Person', 'Fall 2026', false),
(3, 'Cell Biology', 'Online', 'Winter 2026', true),
(4, 'World History', 'In-Person', 'Winter 2026', false);

-- CLASS MEETING
INSERT INTO ClassMeeting (ClassID, Day, StartTime, EndTime, Location) VALUES
(1, 'Monday', '09:00:00', '10:30:00', 'CSE 101'),
(1, 'Wednesday', '09:00:00', '10:30:00', 'CSE 101'),
(2, 'Tuesday', '11:00:00', '12:30:00', 'CSE 203'),
(3, 'Thursday', '13:00:00', '14:30:00', 'MATH 120'),
(4, 'Friday', '10:00:00', '11:30:00', 'BIO 220'),
(5, 'Monday', '14:00:00', '15:30:00', 'HIST 105');

-- APPOINTMENT
INSERT INTO Appointment (StudentID, EmployeeID, Time, Status, Date) VALUES
(1, 1, '10:00:00', 'Scheduled', '2026-06-01'),
(2, 2, '11:00:00', 'Completed', '2026-05-15'),
(3, 1, '14:00:00', 'Scheduled', '2026-06-03'),
(4, 3, '09:00:00', 'Cancelled', '2026-05-20'),
(5, 2, '15:00:00', 'Scheduled', '2026-06-05');

-- EXAM
INSERT INTO Exam (ClassID, Date, Time, Length, File) VALUES
(1, '2026-06-15', '09:00:00', 120, 'exam_db_final.pdf'),
(2, '2026-06-17', '11:00:00', 90, 'exam_ds_final.pdf'),
(4, '2026-03-10', '10:00:00', 60, 'exam_bio_midterm.pdf');

-- EXAM TYPE
INSERT INTO ExamType (ClassID, Type, Allowances) VALUES
(1, 'Closed Book', 'Calculator allowed'),
(2, 'Open Note', 'One page of notes allowed'),
(4, 'Closed Book', 'No materials allowed');

-- EXAM REQUEST
INSERT INTO ExamRequest (ClassID, StudentID, Rules, Date, Time, Duration, Type, Location, ExamType, Materials) VALUES
(1, 1, 'Extended time 1.5x', '2026-06-15', '09:00:00', 180, 'Accommodated', 'DRS Testing Center', 'Closed Book', 'Calculator'),
(2, 2, 'Separate room', '2026-06-17', '11:00:00', 135, 'Accommodated', 'DRS Testing Center', 'Open Note', 'One page of notes'),
(4, 3, 'Extended time 2x', '2026-03-10', '10:00:00', 120, 'Accommodated', 'DRS Testing Center', 'Closed Book', 'None');

-- SYLLABUS
INSERT INTO Syllabus (ClassID, UploadDate, FileTitle, Size, File, FileType) VALUES
(1, '2026-01-05', 'DB Syllabus Spring 2026', 204, 'syllabus_db.pdf', 'PDF'),
(2, '2026-01-06', 'DS Syllabus Spring 2026', 189, 'syllabus_ds.pdf', 'PDF'),
(3, '2026-01-07', 'Calculus I Syllabus', 150, 'syllabus_calc.pdf', 'PDF'),
(4, '2026-01-08', 'Cell Biology Syllabus', 220, 'syllabus_bio.pdf', 'PDF'),
(5, '2026-01-09', 'World History Syllabus', 175, 'syllabus_hist.pdf', 'PDF');

-- ACCOMMODATION REQUEST
INSERT INTO AccommodationRequest (StudentID, Description, QuarterTerm, Documentation, Status, DateSubmitted) VALUES
(1, 'Extended time for exams due to ADHD', 'Fall 2026', 'adhd_doc.pdf', 'Approved', '2026-01-10'),
(2, 'Separate testing room due to anxiety', 'Fall 2026', 'anxiety_doc.pdf', 'Approved', '2026-01-12'),
(3, 'Extended time 2x due to dyslexia', 'Winter 2026', 'dyslexia_doc.pdf', 'Pending', '2026-01-15'),
(4, 'Assistive technology for note-taking', 'Winter 2026', 'visual_doc.pdf', 'Approved', '2026-01-18'),
(5, 'Sign language interpreter', 'Fall 2026', 'hearing_doc.pdf', 'Pending', '2026-01-20');

-- ACCOMMODATION
INSERT INTO Accommodation (StudentID, RequestID, Description, Disability) VALUES
(1, 1, 'Time and a half on all exams', 'ADHD'),
(2, 2, 'Private testing room', 'Anxiety Disorder'),
(3, 3, 'Double time on all exams', 'Dyslexia'),
(4, 4, 'Smart pen for note-taking', 'Visual Impairment'),
(5, 5, 'ASL interpreter in all classes', 'Hearing Impairment');

-- SCHEDULES
INSERT INTO Schedules (StudentID, AppointmentID) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- REVIEWS REQUEST
INSERT INTO ReviewsRequest (EmployeeID, RequestID) VALUES
(1, 1),
(2, 2),
(3, 3),
(1, 4),
(2, 5);

-- SUBMITS EXAM REQUEST
INSERT INTO SubmitsExamRequest (StudentID, ClassID) VALUES
(1, 1),
(2, 2),
(3, 4);

-- TAKES
INSERT INTO Takes (StudentID, ClassID) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 4),
(4, 5),
(5, 2),
(5, 3);

-- ============================================
-- UPDATE COMMANDS
-- ============================================

-- Update a student's status from Part-time to Full-time
UPDATE Student SET Status = 'Full-time' WHERE StudentID = 2;

-- Update a student's email address
UPDATE Student SET Email = 'bobdavis_new@uw.edu' WHERE StudentID = 2;

-- Update a class name that was entered incorrectly
UPDATE Class SET CourseName = 'Introduction to Database Systems' WHERE ClassID = 1;

-- Update an appointment status to Completed
UPDATE Appointment SET Status = 'Completed' WHERE AppointmentID = 1;

-- Update an accommodation request status from Pending to Approved
UPDATE AccommodationRequest SET Status = 'Approved' WHERE RequestID = 3;

-- Update a professor's department
UPDATE Professor SET Department = 'Computer Science & Engineering' WHERE ProfessorID = 1;

-- Update exam length for a class
UPDATE Exam SET Length = 150 WHERE ClassID = 2;

-- Update an employee's department
UPDATE Employee SET Department = 'Accessibility Services' WHERE EmployeeID = 1;
