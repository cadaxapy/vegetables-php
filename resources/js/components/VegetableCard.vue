<template>
    <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h4 class="card-title">{{name}}</h4>
                  <p class="card-text">{{ description }}</p>
                  <a href="#" class="card-link">{{ price}} Сом</a>
                  <button class="card-link btn btn-primary" href="/cart/store" :disabled="isAdded == 1" @click="addToStore" v-text="buttonText"></button>
                </div>
              </div>
        </div>
</template>

<script>
    export default {
        props: ['vegetableId', 'name', 'description', 'price', 'isAdded'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.follows,
            }
        },
        methods: {
            addToStore() {
                axios.post('/cart/store', {
                    vegetable_id: this.vegetableId,
                    count: 1,
                })
                    .then(response => {
                        this.isAdded = true;
                        console.log(response.data);
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            }
        },
        computed: {
            buttonText() {
                return (this.isAdded) ? 'Добавлена' : 'Добавить в корзину';
            }
        }
    }
</script>
