<?php

namespace App\Http\Livewire;

use App\Tools;
use Laravel\Jetstream\Http\Livewire\NavigationDropdown;

class Navigation extends NavigationDropdown
{
    public string $tool;

    public function links(): array
    {
        $this->tool = Tools::current();

        switch ($this->tool) {
            case Tools::REFERER:
                $links = [
                    [
                        'href' => route('connections.index'),
                        'label' => __('Connections'),
                        'active' => request()->routeIs('connections.*')
                    ],
                    [
                        'href' => route('templates.index'),
                        'label' => __('Templates'),
                        'active' => request()->routeIs('templates.*')
                    ],
                    [
                        'href' => route('pages.index'),
                        'label' => __('Pages'),
                        'active' => request()->routeIs('pages.*')
                    ],

                ];
                break;
            
            case Tools::DRIP_FEED:
                $links = [
                    [
                        'href' => route('connections.index'),
                        'label' => __('Connections'),
                        'active' => request()->routeIs('connections.*')
                    ],
                    [
                        'href' => route('listings.index'),
                        'label' => __('Lists'),
                        'active' => request()->routeIs('listings.*')
                    ],
                    [
                        'href' => route('rules.index'),
                        'label' => __('Rules'),
                        'active' => request()->routeIs('rules.*')
                    ],
                    [
                        'href' => route('invalidemail.index'),
                        'label' => __('Invalid Email'),
                        'active' => request()->routeIs('invalidemail.*')
                    ],
                    [
                        'href' => route('emaillogs.index'),
                        'label' => __('Email Logs'),
                        'active' => request()->routeIs('emaillogs.*')
                    ],
                    [
                        'href' => route('cron.index'),
                        'label' => __('Cron'),
                        'active' => request()->routeIs('cron.*')
                    ]
                ];
                break;
                case Tools::EVENT_CALENDER:
                $links = [
                    [
                        'href' => route('groups.index'),
                        'label' => __('Groups'),
                        'active' => request()->routeIs('groups.*')
                    ],
                    [
                        'href' => route('eventcalender.index'),
                        'label' => __('Events'),
                        'active' => request()->routeIs('eventcalender.*')
                    ],
                    [
                        'href' => route('gmailconnection.index'),
                        'label' => __('Gmail Connection'),
                        'active' => request()->routeIs('gmailconnection.*')
                    ],
                    [
                        'href' => route('listings.index'),
                        'label' => __('Lists'),
                        'active' => request()->routeIs('listings.*')
                    ]

                ];
                break;
            
            default:
                $links = [];
                break;
        }

        return $links;
    }

    public function tools(): array
    {
        return [
            [
                'key' => 'referer',
                'label' => 'Referer'
            ],
            
            [
                'key' => 'drip_feed',
                'label' => 'Drip feed'
            ],
            [
                'key' => 'event_calender',
                'label' => 'Event Calender'
            ],
            
        ];
    }

    public function selectTool($tool): void
    {
        $this->tool = $tool;

        Tools::switch($tool);

        if (count($this->links())) {
            $this->redirect(head($this->links())['href']);
        }
    }

    public function getSelectedToolProperty()
    {
        $tools = collect($this->tools());
        return $tools->first(fn ($tool) => $tool['key'] === $this->tool) ?? $tools->first();
    }

    public function render()
    {
        return view('navigation-dropdown', [
            'tools' => $this->tools(),
            'links' => $this->links()
        ]);
    }
}
