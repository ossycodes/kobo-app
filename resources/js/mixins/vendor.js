export const vendorApp = {
    data:{
        vendorTableRows:[],
        vendors: '',
        search: '',
        vendorCount: '',
        vendorFormErrors: [],
        isLoading: false
    },

    created() {
        this.vendors = window.all_vendors;
        this.addNewRow();
    },
    methods: {
        saveVendor() {
            this.isLoading = true;
            let data = {
                items: this.vendorTableRows,
            };
            axios.post('/client/vendor/add', data)
            .then(res => {
                this.vendorTableRows = [],
                this.addNewRow();
                swal({
                    title: 'Vendor added!',
                    text: res.data.message,
                    type: 'success',
                    timer: 1500
                });
                this.isLoading = false;
                this.vendorFormErrors = "";
            })
            .catch(error => {
                this.vendorFormErrors = error.response.data.errors;
                this.isLoading = false;
                console.log(this.vendorFormErrors);
            });
        },

        searchVendor() {
             axios.get(`/client/vendor/search?param=${this.search}`).then(res => {this.vendors = res.data;});
        },
        addNewRow() {
            this.vendorTableRows.push(
                {
                    name: '',
                    address: '',
                    phone: '',
                    email: '',
                    website: '',
                }
            );
        },
        deleteVendorRow(row) {
            $("#row-" + row).remove();
        },

        activateVendor(id) {
            axios.post(`/client/vendor/${id}/activate`).then(res => {
                swal("Success", res.data.message, "success");
            });
        }
    }
};
