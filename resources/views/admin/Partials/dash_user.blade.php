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
                $links = [
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
                    ],
                    [
                        'route' => 'mycontacts.show',
                        'icon' => 'fas fa-comments',
                        'label' => __('backend/sidebar.Messages'),
                        'url' => url('/dashboard/mycontacts')
                    ]
                ];
                @endphp

                <li>
                    <br>
                    <h6 class="dashboard-title" onclick="toggleLinks()">
                        {{ __('backend/sidebar.Users') }}
                        <i class="fas fa-chevron-down arrow-icon"></i> <!-- Ícone de seta -->
                    </h6>
                    <div class="dashboard-links" style="display: block;">
                        @foreach ($links as $link)
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
    function toggleLinks() {
        const linksContainer = document.querySelector('.dashboard-links');
        if (linksContainer.style.display === "none" || linksContainer.style.display === "") {
            linksContainer.style.display = "block"; // Mostra os links
        } else {
            linksContainer.style.display = "none"; // Esconde os links
        }
    }
</script>
