How to fix dead links:
    Dead links can be caused by a few things:
        1. Job Number
        2. Incorrect Customer Name
        3. Job Folder does not exist (currently)

    Number 1.
        Job Numbers are always generated regardless if the job is a repeat. However, if the job is a repeat the file system will already have the old job number with everything stored inside. The only thing that links the "new" job number and the old job number is the Routing Sheet.
        
        Fix:
            Create a shortcut inside of \\tiws07\dwg\Customer\year\Customer_Name\Jobs\ that is of the "new" job number, and link it to wherever the old job number is. The site will now seamlessly follow where the shortcut is, and then the user is able to view everything inside of the job folder.

    Number 2.
        Customer Names on the site also follow what the name of the customers are in the FILESYSTEM. This means that a functional link looks like \\tiws07\dwg\Customer\2021\Cummins. While a dead link looks like \\tiws07\dwg\Customer\2021\CUMMINS EMMISSIONS SOLUTIONS. They are the same customer, howver the site can't relate the two together. 

        Fix:
            All customer names in the file system MUST be named the exact same as they are in E2. This comes with a catch. Inside of Schemas\pick_a_file.sql I have a large list of many sql queries that change the E2 names to the names in the filesystem. Depending on how this site is used looking forward, you can delete those lines and this will effect any previous jobs from 2021. THISS WILL KILL ALL LINKS THAT CURRENTLY WORK FOR THE 2021 FOLDER. So think about this before deleting all of those lines.

            
