export const rentApp = {
    data: {
        rents: [],
        banks: [],
        rentType: null,
        rentAmount: "",
        rentEndDate: "",
        editingRent: {},
        selectedRent: {},
        rentStartDate: "",
        rentLoading: false,
        paymentMethods: [],
        isRequesting: false,
        rentSearchParam: "",
        other_costs: [],
        rentShowPaymentSettings: false,
    },
    mounted () {
        this.addOtherCosts();
        this.banks = window.banks;
        this.rents = window.rents;
    },
    methods: {
        removeOtherCost (key) {
            this.other_costs.splice(this.other_costs.findIndex(cost => cost.key === key),1);
        },
        addOtherCosts () {
            this.other_costs.push({
                key: Math.floor(Math.random() * 123456),
                description: null,
                amount: 0
            });
        },
        removeCost () {

        },
        dater (value) {
            let date = new Date(value);
            let options = { month: 'long'};
            let month = new Intl.DateTimeFormat('en-US', options).format(date);
            let year = date.getFullYear();
            return `${date.getDate()} ${month} ${year}`;
        },
        beforeSubmit (form) {
            document.querySelector(`#${form}`).querySelector('.submitBtn').click();
        },
        purifyCostsAndGetRentAmount () {
            this.other_costs = this.other_costs.filter(cost => cost.description !== null);
            let amount = 0; 
            this.other_costs.forEach(cost => {
                amount += Number(cost.amount);
            });
            return Number(amount);
        },
        createRent (evt) {
            evt.preventDefault();
            this.isRequesting = true;
            let formData = new FormData(evt.target);
            let rentAmount = Number(this.purifyCostsAndGetRentAmount()) + Number(this.rentAmount);
            formData.set('amount', rentAmount);
            if (this.rentType) {
                formData.set('type', this.rentType);
            }
            formData.append('other_costs', JSON.stringify(this.other_costs));
            axios.post('/client/rent/add', formData).then(res => {
                swal("Success", "Rent added successfully", "success");
                this.isRequesting = false;
                if (this.rentType) {
                    this.$eventHub.$emit('newOpeningRent', res.data.rent);
                } else {
                    location.reload();
                }
                $('#addRentModal').modal('toggle');
            });
        },
        rentUsed (rent) {
            let start = moment(rent.start);
            let end = moment(rent.end);
            let today = moment();
            let amortized = 0;
            let diff = start.diff(end, 'months');

            if (diff === 0) {
                amortized = rent.amount;
            } else {
                amortized = rent.amount / diff;
            }

            if (today.isAfter(end)) {
                return rent.amount;
            }
            // debugger;
            return amortized * (diff - today.diff(end, 'months') );

        },

        getStatus (rent) {
            let amount = rent.amount;
            let rentUsed = this.rentUsed(rent);
            let status = rentUsed * 100 / amount
            return `${100 - status.toFixed(0)}`;
        },

        searchRent () {
            if (this.rentSearchParam.trim()) {
                this.rentLoading = true;
                axios.get (`/client/rent/search/${this.rentSearchParam.trim()}`)
                    .then ( (res) => {
                        this.rents = res.data.rents;
                        this.rentLoading = false;
                    } )
                    .catch ((err) => {
                        this.rentLoading = false;
                        swal("Oops", "An error occurred while processing your request", "error");
                    })
                ;
            }
        },

        balance (rent) {
            return rent.amount - this.rentUsed(rent);
        },
        openPaymentModal(rent) {
            this.selectedRent = rent;
            this.openModal('#paymentModal');
        },
        closeRentModal (id) {
            this.other_costs = [];
            this.addOtherCosts();
            this.closeModal(`#${id}`);
        },
        editRent (evt, rent) {
            this.editingRent = {...rent};
            this.other_costs = JSON.parse(this.editingRent.other_costs);
            this.editingRent.amount = Number(this.editingRent.amount) - Number(this.purifyCostsAndGetRentAmount());
            this.openModal('#editRentModal');
        },

        updateRent(evt) {
            evt.preventDefault();

            let formData = new FormData(evt.target);
            formData.append('other_costs', JSON.stringify(this.other_costs));
            let rentAmount = Number(this.purifyCostsAndGetRentAmount()) + Number(this.editingRent.amount);
            formData.set('amount', rentAmount);
            this.isRequesting = true;
            axios.post(`/client/rent/update/${this.editingRent.id}`, formData).then((response) => {
                this.isRequesting = false;
                swal("Success", "Rent updated successfully", "success");
                this.rents.splice(this.rents.findIndex((rent) => {
                    return rent.id === this.editingRent.id;
                }), 1, response.data.rent);
                this.closeRentModal('editRentModal')
            });
        },

        setRentParams () {
            this.openModal('#addRentModal');
        },
    }
};
