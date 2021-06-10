const sql = require('mssql/msnodesqlv8');
const { request, response} = require('express');
const { stringify } = require('querystring');

const config = new sql.ConnectionPool({
    user: 'TIRPS\Nathan',
    password:"",
    server: 'localhost',
    database: 'NathanC_testing',
    driver: "msnodesqlv8",
    options:{
        trustedConnection: true,
        enableArithPort: true,
        instancename: 'INTERNNOTE'
    },
    port: 8081
});

//Retrive all jobs available
async function getSchedule(){
    try{
        await config.connect()
        .then(()=>{
        const request = new sql.Request();
    });
        const result = await config.request().query("SELECT * FROM Job_Schedule_Details");
        return result.recordsets;
    }catch(error){
        console.log(error);
    }
}

//Retrive any jobs with a specfic id number
async function getAjob(JSDID){
    try {
        await config.connect()
        .then(()=>{
            const request = new sql.Request();
        })
        const result = await config.request()
        .input('input_parameter',sql.Int, JSDID)
        .query('SELECT * FROM Job_Schedule_Details WHERE JSDID = @input_parameter');
        return result.recordsets;
    } catch (error) {
        console.log(error);
    }
}

module.exports = {
    getSchedule: getSchedule, 
    getAjob: getAjob
};