<div class="dashboard-left-content">
    <div class="dashboard-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="dashboard-bottom">
            <ul class="dashboard-list list-style-none">
                <li class="list active">
                    <a class="dashboard-link" href="/dashboard">
                        <i class="fas fa-tachometer-alt"></i> User Dashboard
                    </a>
                </li>


                @php
                $actual_link = url()->current();
                $linksA = [
                    [
                        'route' => 'myreservations.show',
                        'icon' => 'fas fa-calendar-check',
                        'label' => __('backend/sidebar.booking'),
                        'url' => url('/dashboard/myreservations') // Use url() for dynamic URLs
                    ],
                    [
                        'route' => 'mycalendarys.show',
                        'icon' => 'fas fa-calendar',
                        'label' => __('backend/sidebar.Calendar'),
                        'url' => url('/dashboard/mycalendary')
                    ]
                ];

                $linksB = [
                    [
                        'route' => 'mycontacts.show',
                        'icon' => 'fas fa-comments',
                        'label' => __('backend/sidebar.Messages'),
                        'url' => url('/dashboard/mycontacts')
                    ]
                ]
                @endphp

                <li>
                    <br>
                    <h6 class="dashboard-title" onclick="toggleLinksA()">
                        {{ __('backend/userSidebar.booking_management') }}
                        <i class="fas fa-chevron-up arrow-iconA"></i> <!-- Ícone de seta -->
                    </h6>
                    <div class="dashboard-linksA" style="display: block;">
                        @foreach ($linksA as $link)
                            <h6>
                                <a class="dashboard-link {{ $actual_link === $link['url'] ? 'active' : '' }}"
                                   href="{{ route($link['route']) }}">
                                    <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                                </a>
                            </h6>
                        @endforeach
                    </div>

                    <br>
                    <h6 class="dashboard-title" onclick="toggleLinksB()">
                        {{ __('backend/userSidebar.contacts') }}
                        <i class="fas fa-chevron-up arrow-iconB"></i> <!-- Ícone de seta -->
                    </h6>
                    <div class="dashboard-linksB" style="display: block;">
                        @foreach ($linksB as $link)
                            <h6>
                                <a class="dashboard-link {{ $actual_link === $link['url'] ? 'active' : '' }}"
                                   href="{{ route($link['route']) }}">
                                    <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                                </a>
                            </h6>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<style>

    .dashboard-list {
        list-style: none;
        padding: 0;
    }

    .dashboard-title {
        text-decoration: none;
        color: #333; /* Cor mais suave */
        font-size: 16px; /* Aumentar o tamanho da fonte */
        display: block;
        text-align: left;
        margin-left: 15px;
        margin-bottom: 10px; /* Aumentar o espaço abaixo do título */
        padding: 10px; /* Aumentar o padding */
        border-radius: 5px;
        background-color: #f9f9f9; /* Cor de fundo suave */
        border-left: 4px solid #FF8C32 ; /* Borda à esquerda para destaque */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        cursor: pointer;
    }

    .arrow-iconA, .arrow-iconB {
        float: right; /* Empurra o ícone para a direita */
        transition: transform 0.3s; /* Transição suave para a rotação */
    }

    .dashboard-link {
        text-decoration: none;
        color: black;
        font-size: 16px;
        display: block;
        text-align: left;
        margin-left: 15px;
        margin-bottom: 5px;
        padding: 5px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .dashboard-linksB {
        transition: all .5s;
    }

    .dashboard-link:hover {
        background-color: #f0f0f0; /* Cor de fundo ao passar o mouse */
    }

    .dashboard-link.active {
        color: #FF8C32; /* Cor do link ativo */
        /*font-weight: bold; /* Destacar o link ativo */
        /*background-color: #e0e0ff; /* Cor de fundo para o link ativo */
    }
</style>

<script>
    function toggleLinksA() {
        const linksContainer = document.querySelector('.dashboard-linksA');
        const arrowIcon = document.querySelector('.arrow-iconA');

        if (linksContainer.style.display === "none" || linksContainer.style.display === "") {
            linksContainer.style.display = "block"; // Mostra os links
            arrowIcon.classList.add('fa-chevron-up'); // Remove a seta para baixo
            arrowIcon.classList.remove('fa-chevron-down'); // Adiciona a seta para cima
        } else {
            linksContainer.style.display = "none"; // Esconde os links
            arrowIcon.classList.remove('fa-chevron-up'); // Remove a seta para baixo
            arrowIcon.classList.add('fa-chevron-down'); // Adiciona a seta para cima
        }
    }

    function toggleLinksB() {
        const linksContainer = document.querySelector('.dashboard-linksB');
        const arrowIcon = document.querySelector('.arrow-iconB');

        if (linksContainer.style.display === "none" || linksContainer.style.display === "") {
            linksContainer.style.display = "block"; // Mostra os links
            arrowIcon.classList.add('fa-chevron-up'); // Remove a seta para baixo
            arrowIcon.classList.remove('fa-chevron-down'); // Adiciona a seta para cima
        } else {
            linksContainer.style.display = "none"; // Esconde os links
            arrowIcon.classList.remove('fa-chevron-up'); // Remove a seta para baixo
            arrowIcon.classList.add('fa-chevron-down'); // Adiciona a seta para cima
        }
    }
</script>
