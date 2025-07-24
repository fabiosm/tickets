@php
use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
};
@endphp
<div>
   <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('dashboard') }}">Vali</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="bi bi-person me-2 fs-5"></i> {{ __('Profile') }}
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" wire:click="logout">
                        <i class="bi bi-box-arrow-right me-2 fs-5"></i> {{ __('Log Out') }}
                    </a>
                </li>
            </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img
                class="app-sidebar__user-avatar"
                src="https://randomuser.me/api/portraits/men/1.jpg"
                alt="User Profile"
            />
            <div>
                <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
                <p class="app-sidebar__user-designation">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <ul class="app-menu">
        @foreach ($menu as $item)
            <li class="treeview {{ $item['isExpanded'] }}">
                <a
                    class="app-menu__item {{ $item['active'] }}"
                    href="{{ $item['url'] }}"
                    @if ($item['submenu']) data-toggle="treeview" @endif
                >
                    <i class="app-menu__icon bi {{ $item['icon'] }}"></i>
                    <span class="app-menu__label">{{ $item['name'] }}</span>
                    @if ($item['submenu'])
                        <i class="treeview-indicator bi bi-chevron-right"></i>
                    @endif
                </a>
                @if ($item['submenu'])
                    <ul class="treeview-menu">
                    @foreach ($item['menu'] as $i => $sub)
                        <li>
                            <a class="treeview-item {{ $sub['active'] }}" href="{{ $sub['url'] }}">
                                <i class="icon bi bi-circle-fill"></i>
                                {{ $sub['name'] }}
                            </a>
                        </li>
                    @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        </ul>
    </aside>
</div>
