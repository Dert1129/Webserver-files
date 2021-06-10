const sql = require('mssql/msnodesqlv8');
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
module.exports = {
    config
};
