class Order {
    constructor(JSDID, Technician, Job_number, Due_Date, 
        Customer, Part_number, Part_Description, Customer_PO, 
        Qty, Value, Profit, Product_Code){
            this.JSDID = JSDID;
            this.Technician = Technician;
            this.Job_number = Job_number;
            this.Due_Date = Due_Date;
            this.Customer = Customer;
            this.Part_number = Part_number;
            this.Part_Description = Part_Description;
            this.Customer_PO = Customer_PO;
            this.Qty = Qty;
            this.Value = Value;
            this.Profit = Profit;
            this.Product_code = Product_Code;
    }
}

module.exports = {
    Order
};