var Order = require('./src/Job_Schedule_Details_Order');
const dbOperations = require('./src/dboperations');
var beautify = require('json-beautify');


var express = require('express');
var bodyParser = require('body-parser');
var cors = require('cors');
var app = express();
var router = express.Router();

app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());
app.use(cors());
app.use('/index',router);

var port = process.env.PORT || 8080;
app.listen(port);
console.log("Job_Schedule_Details API is running at " + port);


router.use((request,response,next)=>{
    console.log('middleware');
    next();
});

//routes
router.route('/jobs').get((request,response)=>{
    
    dbOperations.getSchedule().then(result =>{
        //console.log(result);
        response.json(result[0]);
    })
})

router.route('/jobs/:id').get((request,response)=>{
    
    dbOperations.getAjob(request.params.id).then(result =>{
        //console.log(result);
        response.json(result[0]);
    })
})

const site_info = {
    info: 'Test website',
    version: '0.0.1',
    author: 'Nathan Creger'
};

//fetch helloworld.html 
let http = require("http");
let fs = require('fs');

let handleRequest = (request,response) =>{
    response.writeHead(200, {
        'Content-Type': 'text/html'
    });
    fs.readFile('./helloworld.html',null, function(error, data){
        if (error){
            response.writeHead(404);
            response.write('File not found')
        }else{
            response.write(data);
        }
        response.end();
    })
}
http.createServer(handleRequest).listen(8000);

app.get('/about', (request, response) => response.json(site_info));

