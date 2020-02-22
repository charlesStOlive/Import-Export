<?php namespace Waka\ImportExport;

use Backend;
use Event;
use Lang;
use System\Classes\PluginBase;
use View;

/**
 * ImportExport Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['Waka.Utils'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'ImportExport',
            'description' => 'No description provided yet...',
            'author' => 'Waka',
            'icon' => 'icon-leaf',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        /**
         * INJECTOR
         */
        \Waka\ImportExport\Injectors\ConfigImportExportBackendUser::inject();

        /**
         * EVENT FOR BUTTON
         */
        Event::listen('backend.top.index', function ($controller) {
            $user = \BackendAuth::getUser();
            if (!$user->hasAccess('waka.importexport.impexp.*') && !$user->hasAccess('waka.importExport.imp')) {
                return;
            }

            if (in_array('Waka.ImportExport.Behaviors.ExcelImport', $controller->implement)) {
                $data = [
                    'model' => $modelClass = str_replace('\\', '\\\\', $controller->listGetConfig()->modelClass),
                    //'modelId' => $controller->formGetModel()->id
                ];
                return View::make('waka.importexport::excelimport_popup')->withData($data);;
            }
        });
        Event::listen('backend.top.index', function ($controller) {
            $user = \BackendAuth::getUser();
            if (!$user->hasAccess('waka.importexport.impexp.*') && !$user->hasAccess('waka.importExport.exp')) {
                return;
            }
            if (in_array('Waka.ImportExport.Behaviors.ExcelExport', $controller->implement)) {
                $data = [
                    'model' => $modelClass = str_replace('\\', '\\\\', $controller->listGetConfig()->modelClass),
                    //'modelId' => $controller->formGetModel()->id
                ];
                return View::make('waka.importexport::excelexport_popup')->withData($data);;
            }
        });

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Waka\ImportExport\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'waka.importExport.impexp.all.admin' => [
                'tab' => 'Waka',
                'label' => 'Administrateur des imports exports',
            ],
            'waka.importExport.impexp.all' => [
                'tab' => 'Waka',
                'label' => 'Importe et exporte tout',
            ],
            'waka.importExport.impexp.limited' => [
                'tab' => 'Waka',
                'label' => 'Importe et exporte des données avec des restrictions',
            ],
            'waka.importExport.imp' => [
                'tab' => 'Waka',
                'label' => 'Importe des données avec des restrictions',
            ],
            'waka.importExport.exp' => [
                'tab' => 'Waka',
                'label' => 'Exporte des données avec des restrictions',
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [];

    }
    public function registerSettings()
    {

        return [
            'configImports' => [
                'label' => Lang::get('waka.importexport::lang.menu.imports_title'),
                'description' => Lang::get('waka.importexport::lang.menu.imports_description'),
                'category' => Lang::get('waka.importexport::lang.menu.category'),
                'url' => Backend::url('waka/importexport/configimports'),
                'icon' => 'icon-caret-square-o-down',
                'permissions' => ['waka.importexport.admin'],
                'order' => 500,
            ],
            'configExports' => [
                'label' => Lang::get('waka.importexport::lang.menu.exports_title'),
                'description' => Lang::get('waka.importexport::lang.menu.exports_description'),
                'category' => Lang::get('waka.importexport::lang.menu.category'),
                'url' => Backend::url('waka/importexport/configexports'),
                'icon' => 'icon-caret-square-o-up',
                'permissions' => ['waka.importexport.admin'],
                'order' => 500,
            ],
            'configImportTypes' => [
                'label' => Lang::get('waka.importexport::lang.menu.types_title'),
                'description' => Lang::get('waka.importexport::lang.menu.types_description'),
                'category' => Lang::get('waka.importexport::lang.menu.category'),
                'url' => Backend::url('waka/importexport/types'),
                'icon' => 'icon-file-code-o',
                'permissions' => ['waka.importexport.admin'],
                'order' => 500,
            ],
            'configImportlogs' => [
                'label' => Lang::get('waka.importexport::lang.menu.logs_title'),
                'description' => Lang::get('waka.importexport::lang.menu.logs_description'),
                'category' => Lang::get('waka.importexport::lang.menu.category'),
                'url' => Backend::url('waka/importexport/types'),
                'icon' => 'icon-terminal',
                'permissions' => ['waka.importexport.admin'],
                'order' => 500,
            ],
        ];
    }
}
