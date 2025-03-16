<template>
    <div>
        <button v-if="status == false" type="button" @click.prevent="like_check"><i class="fa-regular fa-heart" style="font-size: 20px;"></i></button>
        <button v-else type="button" @click.prevent="like_check"><i class="fa-solid fa-heart" style="color:red; font-size: 20px;"></i></button>
    </div>
</template>
<script>
export default {
    props: ['image_id'],
    data() {
        return {
            status: false,
            count: 0,
        }
    },
    created() {
        this.first_check()
    },
    methods: {
        first_check() {
            const id = this.image_id
            const array = ["/images/",id,"/checkLike"];
            const path = array.join('')
            axios.get(path).then(res => {
                if(res.data == 1) {
                    console.log(res)
                    this.status = true
                    console.log(this.status)
                } else {
                    console.log(res)
                    this.status = false
                    console.log(this.status)
                }
            }).catch(function(err) {
                console.log(err)
            })
        },
        like_check() {
            const id = this.image_id
            const array = ["/images/",id,"/like"];
            const path = array.join('')
            axios.post(path).then(res => {
                if(res.data == 1) {
                    this.status = true
                } else {
                    this.status = false
                }
            }).catch(function(err) {
                console.log(err)
            })
        },
    }
}
</script>