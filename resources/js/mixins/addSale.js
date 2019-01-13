export const addSale = {
    data() {
        return {
            sale_customer_id: "",
            saleTax: "",
            saleDate: "",
            salePaymentMethods: [],
            saleItems: [],
        }
    },
    created: function() {
        this.addSaleItemForm();
        this.addSalePaymentMethod();
    },
    computed: {
        availableBankList: function () {
            let that = this;
            return this.banks.filter(function (bank) {
                return that.isBankSelected(bank);
            });

        }
    },
    methods: {
        setPaymentMode: function (paymentMode, selectedBank) {
            paymentMode.bank_id = selectedBank.id;
            paymentMode.name = selectedBank.account_name;
        },
        bankIsNotAvailable: function () {
            return this.salePaymentMethods.length === this.banks.length;
        },
        addSalePaymentMethod: function () {
            if (this.bankIsNotAvailable()) return;
            this.salePaymentMethods.push({
                bank_id: "",
                amount: null,
                name: null,
            });
        },
        getAvailableBankList: function () {
            let that = this;
            let banks = this.banks.filter(function (bank) {
                return that.isBankSelected(bank);
            });
            return banks;
        },
        setAvailableBankList: function () {
            let that = this;
            this.availableBankList = this.banks.filter(function (bank) {
                return that.isBankSelected(bank);
            });
        },
        isBankSelected: function (bank) {
            for (let key in this.salePaymentMethods) {
                console.log(this.salePaymentMethods[key].bank_id !== bank.id);
                return this.salePaymentMethods[key].bank_id !== bank.id;
            }
        },
        removeSalePaymentMethod: function (index) {
            this.salePaymentMethods.splice(index, 1);
        },
        addNewSaleItemRow: function () {
            this.addSaleItemForm();
        },
        addSaleItemForm: function () {
            this.saleItems.push({
                inventory_id:       "",
                description:        "",
                quantity:           "",
                sales_price:        "",
                total_price:        "",
                sale_channel_id:    ""
            });
        }
    }
};