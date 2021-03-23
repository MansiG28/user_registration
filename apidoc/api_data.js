define({ "api": [
  {
    "type": "post",
    "url": "/api/user/add_ticket",
    "title": "Add Ticket",
    "name": "Add_Ticket",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Message</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>HTTP Status Code.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Associated Message.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "error",
            "description": "<p>Error if Any.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n\n           {\n\t\t\t    \"message\": \"User data has been updated Successfully!!!\",\n\t\t\t    \"error\": \"\",\n\t\t\t    \"code\": 200,\n\t\t\t    \"status\": \"Success\",\n\t\t\t    \"data\": {\n\t\t\t        \"request_id\": 1616486681.460377\n\t\t\t    }\n\t\t\t}",
          "type": "json"
        }
      ]
    },
    "examples": [
      {
        "title": "sample input:",
        "content": "{\"message\":\"test message\"}",
        "type": "json"
      }
    ],
    "filename": "application/modules/api/controllers/User.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/user/edit_userinfo",
    "title": "Edit Userinfo",
    "name": "Edit_Userinfo",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "users_fname",
            "description": "<p>User Fname</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "users_lname",
            "description": "<p>User Lname</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>HTTP Status Code.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Associated Message.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "error",
            "description": "<p>Error if Any.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n\n           {\n    \"message\": \"User data has been updated Successfully!!!\",\n    \"error\": \"\",\n    \"code\": 200,\n    \"status\": \"Success\",\n    \"data\": {\n        \"request_id\": 1616486681.460377\n    }\n}",
          "type": "json"
        }
      ]
    },
    "examples": [
      {
        "title": "sample input:",
        "content": "{\"users_fname\":\"D001\",\"users_lname\":\"Test\"}",
        "type": "json"
      }
    ],
    "filename": "application/modules/api/controllers/User.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/user/message_list",
    "title": "Ticket List",
    "name": "Ticket_List",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "users_id",
            "description": "<p>User Id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>HTTP Status Code.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Associated Message.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Ticket Record Object With Token</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "error",
            "description": "<p>Error if Any.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n\n\t\t\t{\n    \"message\": \"Users tickets information has been retrive Successfully!!!\",\n    \"error\": \"\",\n    \"code\": 200,\n    \"status\": \"Success\",\n    \"data\": {\n        \"users_tickets\": [\n            {\n                \"users_id\": \"1\",\n                \"message\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\n                \"users_fname\": \"Testtttt\",\n                \"users_lname\": \"Test\",\n                \"users_email_id\": \"jhon@yahoo.in\"\n            }\n        ],\n        \"request_id\": 1616491244.115002\n    }\n}",
          "type": "json"
        }
      ]
    },
    "examples": [
      {
        "title": "sample input:",
        "content": "{}",
        "type": "json"
      }
    ],
    "filename": "application/modules/api/controllers/User.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/user/login",
    "title": "Login",
    "name": "login",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>Username</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>HTTP Status Code.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Associated Message.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Record Object With Token</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "error",
            "description": "<p>Error if Any.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n    \t{\n    \"message\": \"User Information Retrive Successfully!!!\",\n    \"error\": \"\",\n    \"code\": 200,\n    \"status\": \"Success\",\n    \"data\": {\n        \"token\": \"284dace48b41f81c4eb4b861cc505d026557ed84\",\n        \"UserInfo\": {\n            \"users_id\": \"1\",\n            \"users_fname\": \"John\",\n            \"users_lname\": \"Smith\",\n            \"users_email_id\": \"jhon@yahoo.in\",\n            \"users_password\": \"testuser@123\",\n            \"users_role\": \"Admin\",\n            \"insert_dt\": \"2021-03-23 12:25:08\",\n            \"update_dt\": \"2021-03-23 12:25:08\"\n        },\n        \"request_id\": 1616485496.935314\n    }\n}",
          "type": "json"
        }
      ]
    },
    "examples": [
      {
        "title": "sample input:",
        "content": "{\"username\":\"jhon@yahoo.in\",\"password\":\"testuser@123\"}",
        "type": "json"
      }
    ],
    "filename": "application/modules/api/controllers/User.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/user/users_signup",
    "title": "Signup",
    "name": "signup",
    "group": "User",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "users_fname",
            "description": "<p>Firstname</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "users_lname",
            "description": "<p>Lastname.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "users_email_id",
            "description": "<p>Email Address.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "users_password",
            "description": "<p>Password.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "users_role",
            "description": "<p>Role</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>HTTP Status Code.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Associated Message.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "error",
            "description": "<p>Error if Any.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n\t\t\t{\n    \"message\": \"You are successfully registered!!!\",\n    \"error\": \"\",\n    \"code\": 200,\n    \"status\": \"Success\",\n    \"data\": {\n        \"request_id\": 1616483325.261395\n    }\n}",
          "type": "json"
        }
      ]
    },
    "examples": [
      {
        "title": "sample input:",
        "content": "{\"users_fname\":\"John\",\"users_lname\":\"Smith\",\"users_email_id\":\"jhon@yahoo.in\",\"users_password\":\"testuser@123\",\"users_role\":\"admin\"}",
        "type": "json"
      }
    ],
    "filename": "application/modules/api/controllers/User.php",
    "groupTitle": "User"
  }
] });
