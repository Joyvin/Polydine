<template>
    <nav :style="scroll != 0 ? 'box-shadow: 0 8px 10px;' : ''" :class="scroll != 0 ? 'bg-primary' : 'bg-white'" class="rounded-bottom navbar navbar-light navbar-expand-md fixed-top" id="mainNav">
        <div class="container d-flex justify-content-between">
            <div class="">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img v-if="scroll == 0" class="img-fluid" width="200" :src="logoImgLight" alt="">
                    <img v-else class="img-fluid" width="200" :src="logoImgDark" alt="">
                </a>
                <button data-bs-toggle="collapse" class="navbar-toggler collapsed" data-bs-target="#navcol-1" aria-expanded="false"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            </div>
            <div class="">
                <div class="navbar-collapse collapse" id="navcol-1" style="">
                    <ul class="navbar-nav mx-auto pe-5">
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link active" href="index.html">Home</a></li>
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link" href="projects.html">Plans</a></li>
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link" href="services.html">Groups</a></li>
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link" href="pricing.html">Chat</a></li>
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link" href="contacts.html">Memories</a></li>
                    </ul>
                </div>
            </div>
            <div class="">
                <div class="col-auto d-flex align-items-center">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link show" aria-expanded="true" data-bs-toggle="dropdown" href="#"><span :class="scroll != 0 ? 'text-white' : ''" class="d-none d-lg-inline me-2 text-gray-600 small me-2 pe-1">Joyvin Mendonca</span><img style="width: 32px" class="img-fluid border rounded-circle img-profile" :src="userPic"></a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in" data-bs-popper="none"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-black-50"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-black-50"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-black-50"></i>&nbsp;Activity log</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-black-50"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name:'Polyheader',

    data(){
        return{
            logoImgLight: assetPath('img/logo-lg-light.png'),
            logoImgDark: assetPath('img/logo-lg-dark.png'),
            userPic: assetPath('img/avatar-2.jpg'),
            scroll: 0
        }
    },

    methods:{
        handleScroll(){
            this.scroll = $(window).scrollTop()
        }
    },

    mounted(){
        window.addEventListener('scroll', this.handleScroll);
    }
}
</script>

<style>

</style>