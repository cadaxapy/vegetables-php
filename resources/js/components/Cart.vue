<template>
    <ul class="list-group">
        <div v-for="cart in carts" v-bind:key="cart.id">
            <div
                class="d-flex flex-column justify-content-center align-items-center"
            >
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title">{{ cart.vegetable().name }}</h4>
                        <p class="card-text">{{ cart }}</p>
                        <div
                            class="d-flex justify-content-between align-items-center"
                        >
                        
                            <button
                                class="btn btn-primary"
                                href="/cart/store"
                                @click="remove(cart.id)"
                                v-text="buttonText"
                            ></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</template>

<script>
export default {
    props: ["carts"],
    mounted() {
        console.log(this.carts);
        console.log(JSON.parse(this.carts));
    },
    // data: function() {
    //     return {

    // },       count:
    //     };
    methods: {
        increment() {
            this.count++;
        },
        decrement() {
            this.count--;
        },
        remove(cartId) {
            axios
                .delete("/cart/{cartId}")
                .then(response => {
                    this.carts = this.carts.filter(cartitem => {
                        return cartitem.id != cartId;
                    });
                    console.log(response.data);
                })
                .catch(errors => {
                    console.log(errors);
                });
        }
    },
    computed: {
        inputValue: {
            get() {
                return this.count;
            },
            set(val) {
                this.$emit("updated", val);
            }
        },
        buttonText() {
            return "Удалить";
        }
    }
};
</script>
