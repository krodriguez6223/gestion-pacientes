<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">G.P</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/" class="nav-link">Inicio</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/paciente" class="nav-link">Pacientes</router-link>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container mt-5">
           
            <router-view></router-view>

        </div>
    </main>
</template>

<script>
    
    export default {}

</script>
