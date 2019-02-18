import {toast} from "../helpers/alert";
export const vendorApp = {
    data: {
        vendorTableRows: [],
        vendors: window.vendors,
        search: '',
        vendorFormErrors: [],
        fileUrls: '',
        isLoading: false,
        // columns: [
        //     'Name',
        //     'Address',
        //     'Phone Number',
        //     'Email',
        //     'Website',
        // ],
        // // options: {
        // //     filterByColumn: true,
        // //     // texts: {
        // //     //     filterBy: 'Filter by {column}',
        // //     //     count:''
        // //     // },
        // //     dateColumns: ['created_at'],
        // //     datepickerOptions: {
        // //         showDropdowns: true,
        // //         autoUpdateInput: true,
        // //     },
        // //     headings: {
        // //         name: 'Name',
        // //         address: 'Address',
        // //         phone_number: 'Phone Number',
        // //         email: 'Email',
        // //         website: 'Website',
        // //     },
        // //     filterable: ['name', 'address', 'phone_number', 'email', 'website']
        // // },
    },
    created() {
        this.vendors = this.user_vendors;
        this.addNewRow();
    },

    methods: {
        uploadImage(event, index) {
            toast('Image uploading', 'info')
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append('file', file);
            axios.post('/client/vendor/uploadVendorImage', formData).then(res => {
                toast('Image has been successfully uploaded', 'success');
                this.vendorTableRows[index].image = res.data.data;
                // console.log(this.vendorTableRows[index].image)
           }).catch(error => {
               toast('Error uploading image, try again', 'error')
           });
        },
        saveVendor() {
            this.isLoading = true;
            let data = {
                items: this.vendorTableRows,
            };
            axios.post('/client/vendor/add', data).then(res => {
                this.vendorTableRows = [],
                this.addNewRow();
                toast(res.data.message, 'success');
                this.isLoading = false;
                this.vendorFormErrors = "";
            })
            .catch(error => {
                this.vendorFormErrors = error.response.data.errors;
                this.isLoading = false;
            });
        },
        searchVendor() {
             axios.get(`/client/vendor/search?param=${this.search}`).then(res => {
                 this.vendors = res.data;
             });
        },
        addNewRow() {
            this.vendorTableRows.push(
                {
                    name: '',
                    address: '',
                    phone: '',
                    email: '',
                    website: '',
                    image: this.fileUrls,
                },
            );
        },
        deleteVendorRow(row) {
            this.vendorTableRows.splice(this.vendorTableRows.findIndex(item => item === row ), 1);
        },
        activateVendor(id) {
            axios.post(`/client/vendor/${id}/activate`).then(res => {
                swal({type: 'success', title: 'Success', text: res.data.message, timer: 3000, showConfirmButton: false});
            });
        }
    }
};
