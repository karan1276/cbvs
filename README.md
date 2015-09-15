# CBVS
## Criminal Background Verification System

### Problem
Criminal backgrounds of employees and tenants are often left unverified by employers and landlords. This leads to employment of, or letting out properties to, criminals, and inevitably leads to mishaps thereafter. This is especially true for domestic helpers and drivers.

### Opportunity
A system can be implemented to ease the filing of such verification requests.

**Citizens**
* Reluctant to seek verification
* Time required
* Trips to the police station

**Housing societies**
* Members must handle paperwork
* Trips to the police station
* Present papers for approval of society

**Companies**
* Waste precious man-hours on verification
* Hire extra employees for compliance

These unfavourable factors often cause the entities involved to skip verification.

### Solution
A website and an Android app, coupled with robust and optimised server-side logic, will serve citizens and police well.

**Citizens and Companies**
* Request verification
    + Take picture of employee
    + Scan relevant documents
    + Upload
* Ticket given for follow-up
* Track status using ticket

**Server**
* Caches results to avoid duplication of work
* Returns results immediately if found in cache
* Otherwise, assigns each request to an officer
* Returns results to user as they become available
* Expires old results after 6 months
* Assigns re-verification of old records to officers

**Police**
* Receives verification request
* Follows up, and does the work
* Closes the ticket

### Prototype
All code used in the prototype will be placed under the open source licence GNU GPLv3, and hosted on GitHub.

**Website**
* Mobile optimised
* Touch optimised
* Responsive design
* Validates as much input as possible on client-side
* Separate consoles for citizens and police
* Interface hosted at http://ankitpati.org/cbvs

**Web Server**
* LAMP stack (CentOS 6.7, Apache, MySQL, PHP)
* Robust server-side logic to prevent SQL injection and other attacks
* Validates all input; discards bogus inputs

**Android App**
* Targets API Level 18, compatible with most Android devices
* Material Design
* Validates as much input as possible on client-side
* Separate consoles for citizens and police

### Execution
The prototype will be a fully functional system that can be migrated onto a public cloud infrastructure like Google or Amazon, and pressed into service right away.

### Rewards
The system is not specific to Pune, and can be adopted by police departments around the nation. This will lead to a reduction in crime rates.

### Team
* Ankit Pati
* Majeed Khan
* Ameya Gokhale
* Karan Sharma
* Oishi Chowdhury
* Sanya Kamra
