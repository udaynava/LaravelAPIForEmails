API Route: POST -> http://127.0.0.1:8000/api/send 

JSON Input:

{
    "emails":[
        {
            "email":"udaynava@gmail.com",
            "subject": "First Email Subject",
            "body": "Content of the first Email",
            "attachments": {
                "testfile1.txt": "RHVtbXkgZmlsZSBjb250ZW50CkR1bW15IGZpbGUgY29udGVudApEdW1teSBmaWxlIGNvbnRlbnQKRHVtbXkgZmlsZSBjb250ZW50",
                "testfile2.txt": "dGVzdGZpbGUy"
            }
        },
        {
            "email":"udayamoorthynavaneethakrishnan@gmail.com",
            "subject": "Second Email subject",
            "body": "Second email content -body"
        }
    ]
}
