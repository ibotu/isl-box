
Complete: add a new submenu item called BankEntries and give the code

/Users/ibrahimturan/git/zp/zp-st/zorgportal-wp-st/src/app/BankEntryLines.php



<?php

namespace Zorgportal;

use Zorgportal\App;
use DateTime;
use DateInterval;

class BankEntryLine {

    const COLUMNS = [
        'ID' => null,
        'Account' => null,
        'AccountCode' => null,
        'AccountName' => null,
        'AmountDC' => null,
        'AmountFC' => null,
        'AmountVATFC' => null,
        'Asset' => null,
        'AssetCode' => null,
        'AssetDescription' => null,
        'CostCenter' => null,
        'CostCenterDescription' => null,
        'CostUnit' => null,
        'CostUnitDescription' => null,
        'Created' => null,
        'Creator' => null,
        'CreatorFullName' => null,
        'CustomField' => null,
        'Date' => null,
        'Description' => null,
        'Division' => null,
        'Document' => null,
        'DocumentNumber' => null,
        'DocumentSubject' => null,
        'EntryID' => null,
        'EntryNumber' => null,
        'ExchangeRate' => null,
        'GLAccount' => null,
        'GLAccountCode' => null,
        'GLAccountDescription' => null,
        'LineNumber' => null,
        'Modified' => null,
        'Modifier' => null,
        'ModifierFullName' => null,
        'Notes' => null,
        'OffsetID' => null,
        'OurRef' => null,
        'Project' => null,
        'ProjectCode' => null,
        'ProjectDescription' => null,
        'Quantity' => null,
        'VATCode' => null,
        'VATCodeDescription' => null,
        'VATPercentage' => null,
        'VATType' => null,
        'timestamp' => null,
    ];
}

public static function setupDb( float $db_version=0 )
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        dbDelta("CREATE TABLE `BankEntryLine` (
        `ID` varchar(50) NOT NULL,
        `Account` varchar(50) DEFAULT NULL,
        `AccountCode` varchar(50) DEFAULT NULL,
        `AccountName` varchar(200) DEFAULT NULL,
        `AmountDC` decimal(18,2) DEFAULT NULL,
        `AmountFC` decimal(18,2) DEFAULT NULL,
        `AmountVATFC` decimal(18,2) DEFAULT NULL,
        `Asset` varchar(50) DEFAULT NULL,
        `AssetCode` varchar(50) DEFAULT NULL,
        `AssetDescription` varchar(200) DEFAULT NULL,
        `CostCenter` varchar(50) DEFAULT NULL,
        `CostCenterDescription` varchar(200) DEFAULT NULL,
        `CostUnit` varchar(50) DEFAULT NULL,
        `CostUnitDescription` varchar(200) DEFAULT NULL,
        `Created` datetime DEFAULT NULL,
        `Creator` varchar(50) DEFAULT NULL,
        `CreatorFullName` varchar(100) DEFAULT NULL,
        `CustomField` varchar(50) DEFAULT NULL,
        `Date` datetime DEFAULT NULL,
        `Description` varchar(200) DEFAULT NULL,
        `Division` int(11) DEFAULT NULL,
        `Document` varchar(50) DEFAULT NULL,
        `DocumentNumber` int(11) DEFAULT NULL,
        `DocumentSubject` varchar(200) DEFAULT NULL,
        `EntryID` varchar(50) DEFAULT NULL,
        `EntryNumber` int(11) DEFAULT NULL,
        `ExchangeRate` decimal(18,6) DEFAULT NULL,
        `GLAccount` varchar(50) DEFAULT NULL,
        `GLAccountCode` varchar(50) DEFAULT NULL,
        `GLAccountDescription` varchar(200) DEFAULT NULL,
        `LineNumber` int(11) DEFAULT NULL,
        `Modified` datetime DEFAULT NULL,
        `Modifier` varchar(50) DEFAULT NULL,
        `ModifierFullName` varchar(100) DEFAULT NULL,
        `Notes` varchar(200) DEFAULT NULL,
        `OffsetID` varchar(50) DEFAULT NULL,
        `OurRef` int(11) DEFAULT NULL,
        `Project` varchar(50) DEFAULT NULL,
        `ProjectCode` varchar(50) DEFAULT NULL,
        `ProjectDescription` varchar(200) DEFAULT NULL,
        `Quantity` decimal(18,6) DEFAULT NULL,
        `VATCode` varchar(50) DEFAULT NULL,
        `VATCodeDescription` varchar(200) DEFAULT NULL,
        `VATPercentage` decimal(18,2) DEFAULT NULL,
        `VATType` varchar(10) DEFAULT NULL,
        PRIMARY KEY (`ID`)
      ) {$wpdb->get_charset_collate()};");
    }
    

// Get the journals from our administration
try {
    $Bankentries = new \Picqer\Financials\Exact\BankEntryLine($connection);
    $result   = $Bankentries->get();
    foreach ($result as $Bankentries) {
        echo $Bankentries->Description . '<br>';
    }
} catch (\Exception $e) {
    echo get_class($e) . ' : ' . $e->getMessage();
}

/Users/ibrahimturan/git/zp/zp-st/zorgportal-wp-st/src/app/BankEntryLines copy.php


<?php

namespace Zorgportal;
use Zorgportal\App;
use DateTime;
use DateInterval;

class BankEntryLine 
{
    const COLUMNS = [
        'ID' => null,
        'Account' => null,
        'AccountCode' => null,
        'AccountName' => null,
        'AmountDC' => null,
        'AmountFC' => null,
        'AmountVATFC' => null,
        'Asset' => null,
        'AssetCode' => null,
        'AssetDescription' => null,
        'CostCenter' => null,
        'CostCenterDescription' => null,
        'CostUnit' => null,
        'CostUnitDescription' => null,
        'Created' => null,
        'Creator' => null,
        'CreatorFullName' => null,
        'CustomField' => null,
        'Date' => null,
        'Description' => null,
        'Division' => null,
        'Document' => null,
        'DocumentNumber' => null,
        'DocumentSubject' => null,
        'EntryID' => null,
        'EntryNumber' => null,
        'ExchangeRate' => null,
        'GLAccount' => null,
        'GLAccountCode' => null,
        'GLAccountDescription' => null,
        'LineNumber' => null,
        'Modified' => null,
        'Modifier' => null,
        'ModifierFullName' => null,
        'Notes' => null,
        'OffsetID' => null,
        'OurRef' => null,
        'Project' => null,
        'ProjectCode' => null,
        'ProjectDescription' => null,
        'Quantity' => null,
        'VATCode' => null,
        'VATCodeDescription' => null,
        'VATPercentage' => null,
        'VATType' => null,
        'timestamp' => null,
    ];

    public static function setupDb( float $db_version=0 )
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        dbDelta("CREATE TABLE `BankEntryLine` (
        `ID` varchar(50) NOT NULL,
        `Account` varchar(50) DEFAULT NULL,
        `AccountCode` varchar(50) DEFAULT NULL,
        `AccountName` varchar(200) DEFAULT NULL,
        `AmountDC` decimal(18,2) DEFAULT NULL,
        `AmountFC` decimal(18,2) DEFAULT NULL,
        `AmountVATFC` decimal(18,2) DEFAULT NULL,
        `Asset` varchar(50) DEFAULT NULL,
        `AssetCode` varchar(50) DEFAULT NULL,
        `AssetDescription` varchar(200) DEFAULT NULL,
        `CostCenter` varchar(50) DEFAULT NULL,
        `CostCenterDescription` varchar(200) DEFAULT NULL,
        `CostUnit` varchar(50) DEFAULT NULL,
        `CostUnitDescription` varchar(200) DEFAULT NULL,
        `Created` datetime DEFAULT NULL,
        `Creator` varchar(50) DEFAULT NULL,
        `CreatorFullName` varchar(100) DEFAULT NULL,
        `CustomField` varchar(50) DEFAULT NULL,
        `Date` datetime DEFAULT NULL,
        `Description` varchar(200) DEFAULT NULL,
        `Division` int(11) DEFAULT NULL,
        `Document` varchar(50) DEFAULT NULL,
        `DocumentNumber` int(11) DEFAULT NULL,
        `DocumentSubject` varchar(200) DEFAULT NULL,
        `EntryID` varchar(50) DEFAULT NULL,
        `EntryNumber` int(11) DEFAULT NULL,
        `ExchangeRate` decimal(18,6) DEFAULT NULL,
        `GLAccount` varchar(50) DEFAULT NULL,
        `GLAccountCode` varchar(50) DEFAULT NULL,
        `GLAccountDescription` varchar(200) DEFAULT NULL,
        `LineNumber` int(11) DEFAULT NULL,
        `Modified` datetime DEFAULT NULL,
        `Modifier` varchar(50) DEFAULT NULL,
        `ModifierFullName` varchar(100) DEFAULT NULL,
        `Notes` varchar(200) DEFAULT NULL,
        `OffsetID` varchar(50) DEFAULT NULL,
        `OurRef` int(11) DEFAULT NULL,
        `Project` varchar(50) DEFAULT NULL,
        `ProjectCode` varchar(50) DEFAULT NULL,
        `ProjectDescription` varchar(200) DEFAULT NULL,
        `Quantity` decimal(18,6) DEFAULT NULL,
        `VATCode` varchar(50) DEFAULT NULL,
        `VATCodeDescription` varchar(200) DEFAULT NULL,
        `VATPercentage` decimal(18,2) DEFAULT NULL,
        `VATType` varchar(10) DEFAULT NULL,
        PRIMARY KEY (`ID`)
      ) {$wpdb->get_charset_collate()};");
    }

    public static function get( $id )
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        $sql = "SELECT * FROM $table WHERE ID = %s";

        $sql = $wpdb->prepare( $sql, $id );

        $result = $wpdb->get_row( $sql, ARRAY_A );

        if ( $result ) {
            return $result;
        }

        return false;
    }

    public static function get_all()
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        $sql = "SELECT * FROM $table";

        $result = $wpdb->get_results( $sql, ARRAY_A );

        if ( $result ) {
            return $result;
        }

        return false;
    }

    public static function insert( $data )
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        $wpdb->insert( $table, $data );
    }

    public static function update( $id, $data )
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        $wpdb->update( $table, $data, [ 'ID' => $id ] );
    }

    public static function delete( $id )
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        $wpdb->delete( $table, [ 'ID' => $id ] );
    }

    public static function delete_all()
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        $wpdb->query( "TRUNCATE TABLE $table" );
    }

    public static function get_db_version()
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        $sql = "SELECT VERSION FROM $table ORDER BY VERSION DESC LIMIT 1";

        $result = $wpdb->get_var( $sql );

        if ( $result ) {
            return $result;
        }

        return false;
    }

    public static function set_db_version( $version )
    {
        global $wpdb;

        $table = $wpdb->prefix . App::BANK_ENTRY_LINES_TABLE;

        $wpdb->insert( $table, [ 'VERSION' => $version ] );
    }

    public static function get_db_version_option()
    {
        return get_option( App::BANK_ENTRY_LINES_TABLE . '_db_version' );
    }

    public static function set_db_version_option( $version )
    {
        update_option( App::BANK_ENTRY_LINES_TABLE . '_db_version', $version );
    }

    public static function get_db_version_option_default()
    {
        return 0;
    }


    

    // Get the journals from our administration
    try {
        $Bankentries = new \Picqer\Financials\Exact\BankEntryLine($connection);
        $result   = $Bankentries->get();
        foreach ($result as $Bankentries) {
            echo $Bankentries->Description . '<br>';
        }
    } catch (\Exception $e) {
        echo get_class($e) . ' : ' . $e->getMessage();
    }
/Users/ibrahimturan/git/zp/zp-st/zorgportal-wp-st/src/app/App.php


<?php

namespace Zorgportal;

use Zorgportal\Admin\Admin;
use Zorgportal\Admin\Screen\ImportCodes;
use Zorgportal\Admin\Screen\ImportInvoices;
use Zorgportal\Admin\Screen\Settings;
use Zorgportal\Admin\Screen\Transactions;
use Zorgportal\Admin\Screen\Transactions_2;
use Zorgportal\Admin\Screen\BankEntryLines;
use Picqer\Financials\Exact;

use WP_User;

class App
{
    private $plugin_file;
    private $adminContext;
    private $consumer;

    const SCRIPTS_VERSION = 1659280235;
    const DB_VERSION = 1.8;
    const DB_VERSION_OPTION = 'zorgportal:db_version';
    const DBC_CODES_TABLE = 'zp_dbc_codes';
    const INVOICES_TABLE = 'zp_invoices';
    const PRACTITIONERS_TABLE = 'zp_practitioners';
    const PATIENTS_TABLE = 'zp_patients';
    const EO_LOGS_TABLE = 'zp_api_logsv2';
    const TRANSACTIONS_TABLE = 'zp_transactions';
    const BANK_ENTRY_LINES_TABLE = 'zp_bankentrylines';

    // DBC admin (has access to all menu pages)
    const DBC_ADMIN_ROLE = ['dbc_admin', 'DBC Admin', [
        'manage_dbc_invoices' => true, // invoices page access
        'manage_dbc_codes' => true, // codes page access
        'manage_dbc_practitioners' => true, // practitioner page access
        'manage_dbc' => true, // menu page access
        'read' => true, // wp-admin access
    ]];

    // DBC invoices admin (has access to invoices menu pages)
    const DBC_INVOICES_ADMIN_ROLE = ['dbc_invoices', 'DBC Invoices Admin', [
        'manage_dbc_invoices' => true, // invoices page access
        'manage_dbc' => true, // menu page access
        'read' => true, // wp-admin access
    ]];

    // DBC codes admin (has access to codes menu pages)
    const DBC_CODES_ADMIN_ROLE = ['dbc_codes', 'DBC Codes Admin', [
        'manage_dbc_codes' => true, // codes page access
        'manage_dbc' => true, // menu page access
        'read' => true, // wp-admin access
    ]];

    // DBC codes admin (has access to codes menu pages)
    const DBC_PRACTITIONERS_ADMIN_ROLE = ['dbc_practitioners', 'DBC Practitioners Admin', [
        'manage_dbc_practitioners' => true, // practitioner page access
        'manage_dbc' => true, // menu page access
        'read' => true, // wp-admin access
    ]];

    // how many rows to check per mysql query batch
    const DUPLICATE_IMPORT_QUERY_SIZE = 1000;

    // how many invoices to update per minute?
    // if the day rate limit is 5700, then aim for 3 invoices (5700/1440)
    // set to 40 so it can handle as much as possible within the minute
    // not needed with sync
    const EO_UPDATE_INVOICES_PER_MINUTE = 40;

    // switch between EO endpoints to use for single/bulk transactions
    const USE_EO_RECEIVABLES_LIST_API = false;

    // updates server
    const TRIGGERS_SERVER_URL = 'http://170-187-187-6.ip.linodeusercontent.com';
    const TRIGGER_HTTP_ENDPOINT = '/960e6753c68f9d3bc19e27f2a6c37da8';

    public function __construct( string $plugin_file )
    {
        $this->plugin_file = $plugin_file;
        $this->adminContext = new Admin( $this );
    }

    public function getPluginFile() : string
    {
        return $this->plugin_file;
    }

    public function setup()
    {
        add_action('plugins_loaded', [ $this, 'loaded' ]);

        // activation
        register_activation_hook( $this->getPluginFile(), [ $this, 'activation' ]);

        // deactivation
        register_deactivation_hook( $this->getPluginFile(), [ $this, 'deactivation' ]);

        // custom cron schedule
        add_filter('cron_schedules', [ $this, 'cronInterval' ]);

        // auto-update checker
        $this->initAutoUpdates();
    }

    public function activation()
    {
        $db_version = (float) get_site_option( self::DB_VERSION_OPTION );

        // codes
        DbcCodes::setupDb( $db_version );

        // invoices
        Invoices::setupDb( $db_version );

        // practitioners
        Practitioners::setupDb( $db_version );

        // patients
        Patients::setupDb( $db_version );

        // api logs
        EoLogs::setupDb( $db_version );

        // transactions
        Transactions::setupDb( $db_version );

        // transactions
        BankEntryLine::setupDb( $db_version );

        // update database version
        update_site_option(self::DB_VERSION_OPTION, self::DB_VERSION);

        foreach ( [
            self::DBC_ADMIN_ROLE,
            self::DBC_CODES_ADMIN_ROLE,
            self::DBC_INVOICES_ADMIN_ROLE,
            self::DBC_PRACTITIONERS_ADMIN_ROLE,
        ] as $role ) {
            // delete existing role if any
            get_role($role[0]) && remove_role($role[0]);

            // add user roles
            add_role(...$role);
        }

        // assign to existing admins
        foreach ( get_users([ 'role' => 'administrator', 'number' => -1 ]) as $admin ) {
            in_array($role=self::DBC_ADMIN_ROLE[0], $admin->roles) || $admin->add_role( $role );
        }

        // cron event
        // refresh oauth tokens should be part of the code
        if ( ! wp_next_scheduled( 'zorgportal_refresh_exactonline_oauth_tokens' ) ) {
            wp_schedule_event( time(), '2min', 'zorgportal_refresh_exactonline_oauth_tokens' );
        }

        // cron event
        if ( ! wp_next_scheduled( 'zorgportal_fetch_invoices' ) ) {
            wp_schedule_event( time(), '1min', 'zorgportal_fetch_invoices' );
        }

        // logs cleanup
        if ( ! wp_next_scheduled( 'zorgportal_cleanup_logs' ) ) {
            wp_schedule_event( time(), 'daily', 'zorgportal_cleanup_logs' );
        }

        // default options
        add_option('zorgportal:activation_key', '');
        add_option('zorgportal:flush-logs-older-than-months', '1');

        // instructions attachment file
        $this->maybeInsertInstructionsPdfAttachment();
    }

    public function deactivation()
    {
        // stop cron events
        wp_clear_scheduled_hook('zorgportal_refresh_exactonline_oauth_tokens');
        wp_clear_scheduled_hook('zorgportal_fetch_invoices');
        wp_clear_scheduled_hook('zorgportal_cleanup_logs');
    }

    public function cronInterval( $list )
    {
        return array_merge([
            '1min' => [
                'interval' => 60 *1,
                'display' => __('Every minute', 'zorgportal')
            ],
            '2min' => [
                'interval' => 60 *2,
                'display' => __('Every 2 minutes', 'zorgportal')
            ],
        ], $list);
    }

    public function loaded()
    {
        // i18n
        load_plugin_textdomain(
            'zorgportal', false,
            basename(dirname( $this->getPluginFile() )) . '/languages'
        );

        // REST endpoints
        add_action('rest_api_init', [$this, 'setupRestApiEndpoints']);

        // cron events
        add_action('zorgportal_refresh_exactonline_oauth_tokens', [Settings::class, 'refreshTokensCron']);
        add_action('zorgportal_fetch_invoices', [$this, 'invoicesCron']);
        add_action('zorgportal_cleanup_logs', [$this, 'cleanupLogs']);
    }

    public function setupRestApiEndpoints()
    {
        register_rest_route('zorgportal/v1', '/import/read-file', [
            'methods' => 'POST',
            'callback' => [ $this->adminContext->getScreenObject(ImportCodes::class), 'restExtractFile' ],
            'permission_callback' => function()
            {
                return current_user_can('manage_dbc');
            },
        ]);

        register_rest_route('zorgportal/v1', '/import', [
            'methods' => 'POST',
            'callback' => [ $this->adminContext->getScreenObject(ImportCodes::class), 'restImport' ],
            'permission_callback' => function()
            {
                return current_user_can('manage_dbc_codes');
            },
        ]);

        register_rest_route('zorgportal/v1', '/invoices/import', [
            'methods' => 'POST',
            'callback' => [ $this->adminContext->getScreenObject(ImportInvoices::class), 'restImport' ],
            'permission_callback' => function()
            {
                return current_user_can('manage_dbc_invoices');
            },
        ]);

        register_rest_route('zorgportal/v1', '/invoices/download/(?P<filename>[^\/]+)', [
            'methods' => 'GET',
            'callback' => [ $this->adminContext->getScreenObject(ImportInvoices::class), 'restDownload' ],
            'permission_callback' => function()
            {
                return current_user_can('manage_dbc_invoices');
            },
        ]);

        register_rest_route('zorgportal/v1', '/codes/(?P<code_id>\d++)', [
            'methods' => 'PATCH',
            'callback' => [ $this->adminContext->getScreenObject(ImportInvoices::class), 'updateInsuranceInfo' ],
            'permission_callback' => function()
            {
                return current_user_can('manage_dbc_invoices');
            },
        ]);

        register_rest_route('zorgportal/v1', '/codes', [
            'methods' => 'PUT',
            'callback' => [ $this->adminContext->getScreenObject(ImportInvoices::class), 'insertDbcCodes' ],
            'permission_callback' => function()
            {
                return current_user_can('manage_dbc_invoices');
            },
        ]);
        
        register_rest_route('zorgportal/v1', '/exactonline-webhook', [
            'methods' => 'POST',
            'callback' => [ \Zorgportal\Util\Exact\Webhooks::class, 'receive' ],
        ]);


   

    register_rest_route('zorgportal/v1', '/exact-webhook1', [
            'methods' => 'POST',
            'callback' => [ $this, 'processExactWebhook' ],
            'permission_callback' => '__return_true',
    ]);
    }

    public function processExactWebhook() : \WP_REST_Response
    {

        $request = file_get_contents('php://input'); // get data from webhoook
        $data = json_decode($request, true); // decode the data is you are getting data in JSON format
        var_dump($data);
        //$url = $data['Content']['ExactOnlineEndpoint'];
        //$tokens = get_option('zp_exactonline_auth_tokens');
        
        /*$arguments = [
            'method' => 'GET',
            'headers' => [
                'Authorization' => "bearer {$tokens['access_token']}",
                'Accept' => 'application/json',
            ],
            'timeout' => 20,
        ];
        $response = wp_remote_get( $url, $arguments );
        $response_body = json_decode($response['body'], true);
        */	
        $pastebin_args = [
            'method'      => 'POST',
            'timeout'     => 45,
            'body'        => $data,
        ];
        //$pastebin = wp_remote_get( 'https://eo71itw5qhr8umq.m.pipedream.net', $pastebin_args );
        $data = $data + $response;
        //'response' => ($res['body'] ?? null) ?: '',
        //'response_headers' => self::getResponseHeadersStr( $res ),
        //'http_status' => intval($res['response']['code'] ?? ''),
        
        //echo $data['message']; // I got NULL
        //$id = $data
        
        //$res = wp_remote_post($url, $params);
        //$data = json_decode($res, true);
        
        return new \WP_REST_Response($response_body, 200);
    }
    
    public function invoicesCron()
    {
        $transient_id = '_zorgportal_invoices_cron';
        $value = uniqid();

        // check if any cron job is pending
        if ( get_transient( $transient_id ) )
            return;

        // set lock as our uniqid
        if ( ! set_transient( $transient_id, $value, MINUTE_IN_SECONDS *3 ) )
            return;

        // verify the value is ours
        if ( $value != get_transient( $transient_id ) )
            return;

        // release lock after cron job is finished
        register_shutdown_function(function() use ($transient_id)
        {
            // lock release
            delete_transient($transient_id);
        });

        $this->updateInvoicesEoStatus(function()
        {
            return Invoices::query([
                // 'last_fetched_lte' => time() - DAY_IN_SECONDS, // this will update invoices almost constantly depending on size
                'EoStatus_not_in_or_null' => [ Invoices::PAYMENT_STATUS_PAID ], // [ 2, 3, null ]
                'orderby' => 'EoLastFetched',
                'order' => 'asc',
                'per_page' => $this::EO_UPDATE_INVOICES_PER_MINUTE,
                'current_page' => 1,
            ])['list'];
        });
    }

    public function getCurrentDivisionCode() : ?string
    {
        if ( ! $divisions = get_option('zp_alt_exactonline_divisions') )
            return null;

        $division = current(array_filter($divisions, function($div)
        {
            return ($div['current'] ?? null);
        }));

        if ( ! $division || ! ( $division['code'] ?? null ) )
            return null;

        return $division['code'];
    }

    public function updateInvoicesEoStatus( callable $queryInvoices, bool $send_notices=false ) : ?string
    {
        if ( ! $tokens = get_option('zp_alt_exactonline_auth_tokens') )
            return __('Not authenticated.', 'zorgportal');

        if ( ! ( $tokens['access_token'] ?? null ) )
            return __('Not authenticated.', 'zorgportal');

        if ( ! $division_code = $this->getCurrentDivisionCode() )
            return __('No division selected.', 'zorgportal');

        $invoices = $queryInvoices();

        if ( 0 == count($invoices) )
            return __('No invoices found.', 'zorgportal');

        $alerts = [];

        foreach ( $invoices as $invoice ) {
            $alerts []= Invoices::updateEoStatus($invoice, $tokens, $division_code, $this, $send_notices);
        }

        return join(', ', array_filter($alerts));
    }

    public static function setCounter( string $id, int $value, int $ttl ) : bool
    {
        return set_transient($id, $value, $ttl);
    }

    public static function incrCounter( string $id, int $ttl, int $by=1 ) : bool
    {
        $val = (int) get_transient($id);
        return set_transient($id, $val+$by, $ttl);
    }

    public static function getCounter( string $id ) : int
    {
        return (int) get_transient($id);
    }

    public static function getCounterOrNull( string $id ) : ?int
    {
        return (false === $value=get_transient($id)) ? null : intval($value);
    }

    public function cleanupLogs()
    {
        // delete logs older than 1 month
        EoLogs::deleteExpired( time() - MONTH_IN_SECONDS
            * max(1, intval(get_option('zorgportal:flush-logs-older-than-months', 1))) );
    }

    public static function getResponseHeadersStr( $request, array $source=[] ) : string
    {
        if ( ! $request ) {
            $headerstr = [];

            foreach ( $source as $prop => $val )
                $headerstr []= (is_string($prop) ? "{$prop}: " : '') . $val;
        } else {
            $headerstr = is_wp_error($request) ? [] : explode(PHP_EOL, $request['http_response']->get_response_object()->raw);
        }

        $begin_body = false;

        $headerstr = array_filter($headerstr, function($line) use (&$begin_body)
        {
            if ( $begin_body ) return;
            if ( ! trim($line) ) {
                $begin_body = true;
                return;
            }
            return true;
        });

        return join(PHP_EOL, $headerstr);
    }

    public static function extractNum(?string $raw, int $places=0) : ?float
    {
        $parsed = preg_replace_callback('/[\,\.](\d+)$/s', function($m)
        {
            return '__dec__' . $m[1];
        }, sanitize_text_field($raw));

        $num = str_replace('__dec__', '.', preg_replace('/[^\d\-__dec__]/', '', $parsed));

        return is_numeric($num) ? ( $places > 0 ? round((float) $num, $places) : (float) $num ) : null;
    }

    public static function remoteUrl( string $after = '' ) : string
    {
        return trailingslashit(self::TRIGGERS_SERVER_URL) . preg_replace('/^\/{1,}/', '', $after);
    }

    private function initAutoUpdates()
    {
        if ( $activation_key = get_option('zorgportal:activation_key') ) {
            \Puc_v4_Factory::buildUpdateChecker(
                add_query_arg('client_id', $activation_key, self::remoteUrl(self::TRIGGER_HTTP_ENDPOINT . '/wp-plugin/zorgportal/info')),
                $this->getPluginFile(),
                basename(dirname($this->getPluginFile()))
            );
        }
    }

    private function maybeInsertInstructionsPdfAttachment()
    {
        if ( get_option('zorgportal:instructions_att_id') )
            return;

        $filename = plugin_dir_path( $this->getPluginFile() ) . 'src/assets/Begeleidende brief indienen zorgverzekeraar.pdf';
        $filetype = wp_check_filetype( basename( $filename ), null );
        $attachment = [
            'guid' => wp_upload_dir()['url'] . '/' . basename( $filename ),
            'post_mime_type' => $filetype['type'],
            'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
            'post_content' => '',
            'post_status' => 'inherit'
        ];

        $attach_id = wp_insert_attachment($attachment, $filename, 0);

        if ( $attach_id ) {
            update_option('zorgportal:instructions_att_id', $attach_id);
        }
    }

    public static function callEoApi( string $url, array $params ) : array // [ ?data, ?error, ?wp_request ]
    {
        $day_limit = self::getCounterOrNull('eo/invoices/rate-limit/d');
        $minute_limit = self::getCounterOrNull('eo/invoices/rate-limit/min');

        if ( 0 === $day_limit || 0 === $minute_limit )
            return [null, __('API rate limit reached', 'zorgportal'), null]; // limits exhausted

        $res = wp_remote_post($url, $params);

        self::incrCounter(sprintf('%s/eo-usage/%s', $client_id=get_option('zorgportal_exact_client_id'), date('H-i')), MINUTE_IN_SECONDS);
        self::incrCounter(sprintf('%s/eo-usage/%s', $client_id, date('Y-m-d')), DAY_IN_SECONDS);

        $is_error_res = is_wp_error($res);

        if ( ! is_wp_error($res) && false === strpos(strval($res['response']['code'] ?? ''), '2') ) {
            self::incrCounter(sprintf('%s/eo-errors/%s', $client_id, date('H-00')), HOUR_IN_SECONDS);
            $is_error_res = true;
        }

        // log response status/headers
        EoLogs::insert([
            'request_url' => $url,
            'request_body' => ($params['body'] ?? null) ?: '',
            'request_headers' => self::getResponseHeadersStr( null, ($params['headers'] ?? null) ?: [] ),
            'response' => ($res['body'] ?? null) ?: '',
            'response_headers' => self::getResponseHeadersStr( $res ),
            'http_status' => intval($res['response']['code'] ?? ''),
            'status' => $is_error_res ? EoLogs::STATUS_ERROR : EoLogs::STATUS_OK,
            'date' => time(),
        ]);

        if ( is_wp_error($res) )
            return [null, sprintf(__('Error returned: %s', 'zorgportal'), $res->get_error_message()), $res];

        $dttl = $mttl = 0;

        if ( $dts = intval($res['headers']['x-ratelimit-reset'] ?? null) )
            $dttl = ($dts - time() * 1000) /1000;

        if ( $mts = intval($res['headers']['x-ratelimit-minutely-reset'] ?? null) )
            $mttl = ($mts - time() * 1000) /1000;

        // sometimes the server doesn't return these response headers, so avoid setting 0?
        $rate_limit_minute = $res['headers']['x-ratelimit-minutely-remaining'] ?? null;
        $rate_limit_day = $res['headers']['x-ratelimit-remaining'] ?? null;

        is_numeric($rate_limit_minute) && self::setCounter('eo/invoices/rate-limit/min', intval($rate_limit_minute), $mttl > 0 ? $mttl : MINUTE_IN_SECONDS);
        is_numeric($rate_limit_day) && self::setCounter('eo/invoices/rate-limit/d', intval($rate_limit_day), $dttl > 0 ? $dttl : DAY_IN_SECONDS);

        return [ $res['body'] ?? '', null, $res ];
    }
}
/Users/ibrahimturan/git/zp/zp-st/zorgportal-wp-st/index.html



/Users/ibrahimturan/git/zp/zp-st/zorgportal-wp-st/src/app/Admin/Screen/Transactions_2.php


<?php

namespace Zorgportal\Admin\Screen;

use Picqer\Financials\Exact\SyncTransactionLine;
use Zorgportal\Transactions as Core;
use Zorgportal\App;
use Zorgportal\Admin\Screen\functions;

class Transactions_2 extends Screen
{
    public function render()
    {
        $functions = new functions();
        $connection = $functions->connect_exacton_online_api_without_code();
        $division = get_option('zp_exactonline_current_division');
        $list = array();

        try {
            $journals = new SyncTransactionLine($connection);
            $result = $journals->filter("", '', '*');
            //$lists = $journals->get();
            //print_r($journals);
            $i = 1;
            foreach ($result as $journal) {
                if ($i < 100) {
                    $list[] = array(
                        'id' => $journal->InvoiceNumber,
                        'AmountDC' => $journal->AmountDC,
                        'AmountFC' => $journal->AmountFC,
                        'Status' => $journal->Status,
                        'CreatorFullName' => $journal->CreatorFullName,
                        'Created' => $journal->Created,
                        'FinancialYear' => $journal->FinancialYear,
                    );
                }
                // echo $i.' Devision: ' . $journal->CreatorFullName . '<br>';
                $i++;
            }

            $a = array('list' => $list);
            $arr = array_merge(
                $a,
                [
                    'current_page' => (int) ($_GET['p'] ?? ''),
                    'search' => trim($_GET['search'] ?? ''),
                    'orderby' => $this->getActiveSort()['prop'] ?? '',
                    'order' => $this->getActiveSort()['order'] ?? '',
                    'getActiveSort' => [$this, 'getActiveSort'],
                    'getNextSort' => [$this, 'getNextSort'],
                    'nonce' => wp_create_nonce('zorgportal'),
                ]
            );
          //  var_dump($arr);
            return $this->renderTemplate('transactions.php',  $arr);
        } catch (\Exception $e) {
            echo get_class($e) . ' : ' . $e->getMessage();
        }


        // return $this->renderTemplate('transactions.php', array_merge(Core::query(array_merge(
        //     [
        //         'current_page' => (int) ($_GET['p'] ?? ''),
        //         'search' => trim($_GET['search'] ?? ''),
        //         'orderby' => $this->getActiveSort()['prop'] ?? '',
        //         'order' => $this->getActiveSort()['order'] ?? '',
        //     ],
        //     // ($address = trim($_GET['address'] ?? '')) ? compact('address') : [],
        //     // ($insurer = trim($_GET['insurer'] ?? '')) ? compact('insurer') : [],
        //     // ($policy = trim($_GET['policy'] ?? '')) ? compact('policy') : []
        // )), [
        //     'getActiveSort' => [ $this, 'getActiveSort' ],
        //     'getNextSort' => [ $this, 'getNextSort' ],
        //     'nonce' => wp_create_nonce('zorgportal'),
        // ]));
    }

    public function scripts()
    {
        $base = trailingslashit(plugin_dir_url($this->appContext->getPluginFile()));
        wp_enqueue_style('zportal-codes', "{$base}src/assets/codes.css", [], $this->appContext::SCRIPTS_VERSION);
        wp_enqueue_script('zportal-codes', "{$base}src/assets/codes.js", ['jquery'], $this->appContext::SCRIPTS_VERSION, 1);
    }

    public function update()
    {
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'zorgportal'))
            return $this->error(__('Invalid request, authorization check failed. Please try again.', 'zorgportal'));

        if (isset($_POST['delete_all'])) {
            $del = Core::deleteAll();
            return $this->success(sprintf(
                _n('%d transaction deleted.', '%d transactions deleted.', $del, 'zorgportal'),
                $del
            ));
        }

        $items = array_filter(array_unique(array_map('intval', (array) ($_POST['items'] ?? ''))));

        if (!$items)
            return;

        if ('delete' == ($_POST['action2'] ?? '')) {
            $del = Core::delete($items);
            return $this->success(sprintf(
                _n('%d transaction deleted.', '%d transactions deleted.', $del, 'zorgportal'),
                $del
            ));
        }
    }

    public function getActiveSort(): array
    {
        $sort = explode(',', (string) ($_GET['sort'] ?? ''));
        $prop = strtolower($sort[0] ?? '');
        $order = strtolower($sort[1] ?? '');

        if ($prop && !array_key_exists($prop, Core::COLUMNS)) {
            $prop = '';
            $order = '';
        }

        $order = in_array($order, ['asc', 'desc']) ? $order : 'desc';
        $order = $prop ? $order : '';

        return compact('order', 'prop');
    }

    public function getNextSort(string $prop): string
    {
        $current = $this->getActiveSort();

        if ($prop == $current['prop']) {
            return 'asc' !== $current['order'] ? 'asc' : 'desc';
        }

        return 'desc';
    }
}
/Users/ibrahimturan/git/zp/zp-st/zorgportal-wp-st/src/app/Admin/Screen/Transactions.php


<?php

namespace Zorgportal\Admin\Screen;

use Zorgportal\Transactions as Core;
use Zorgportal\App;
use Picqer\Financials\Exact\SyncTransactionLine;
use Zorgportal\Admin\Screen\functions;

class Transactions extends Screen
{
    public function render()
    {
        return $this->renderTemplate('transactions.php', array_merge(Core::query(array_merge(
            [
                'current_page' => (int) ($_GET['p'] ?? ''),
                'search' => trim($_GET['search'] ?? ''),
                'orderby' => $this->getActiveSort()['prop'] ?? '',
                'order' => $this->getActiveSort()['order'] ?? '',
            ],
            // ($address = trim($_GET['address'] ?? '')) ? compact('address') : [],
            // ($insurer = trim($_GET['insurer'] ?? '')) ? compact('insurer') : [],
            // ($policy = trim($_GET['policy'] ?? '')) ? compact('policy') : []
        )), [
            'getActiveSort' => [ $this, 'getActiveSort' ],
            'getNextSort' => [ $this, 'getNextSort' ],
            'nonce' => wp_create_nonce('zorgportal'),
        ]));
    }

    public function scripts()
    {
        $base = trailingslashit(plugin_dir_url( $this->appContext->getPluginFile() ));
        wp_enqueue_style( 'zportal-codes', "{$base}src/assets/codes.css", [], $this->appContext::SCRIPTS_VERSION );
        wp_enqueue_script( 'zportal-codes', "{$base}src/assets/codes.js", ['jquery'], $this->appContext::SCRIPTS_VERSION, 1 );
    }

    public function update()
    {
        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'zorgportal' ) )
            return $this->error( __('Invalid request, authorization check failed. Please try again.', 'zorgportal') );

        if ( isset( $_POST['delete_all'] ) ) {
            $del = Core::deleteAll();
            return $this->success( sprintf(
                _n( '%d transaction deleted.', '%d transactions deleted.', $del, 'zorgportal' ), $del
            ) );
        }

        $items = array_filter(array_unique( array_map('intval', (array) ($_POST['items'] ?? '')) ));

        if ( ! $items )
            return;

        if ( 'delete' == ( $_POST['action2'] ?? '' ) ) {
            $del = Core::delete($items);
            return $this->success( sprintf(
                _n( '%d transaction deleted.', '%d transactions deleted.', $del, 'zorgportal' ), $del
            ) );
        }
    }

    public function getActiveSort() : array
    {







        utf8_decode(














            u88



            utf8_decode(utf8_decode
            utf8_decode(
                u8\

























                



















                66

            ))
        )
        $sort = explode(',', (string) ( $_GET['sort'] ?? '' ));
        $prop = strtolower($sort[0] ?? '');
        $order = strtolower($sort[1] ?? '');

        if ( $prop && ! array_key_exists($prop, Core::COLUMNS) ) {
            $prop = '';
            $order = '';
        }

        $order = in_array($order, ['asc','desc']) ? $order : 'desc';
        $order = $prop ? $order : '';

        return compact('order', 'prop');
    }

    public function getNextSort( string $prop ) : string
    {
        $current = $this->getActiveSort();

        if ( $prop == $current['prop'] ) {
            return 'asc' !== $current['order'] ? 'asc' : 'desc';
        }

        return 'desc';
    }
}
/Users/ibrahimturan/git/zp/zp-st/zorgportal-wp-st/src/app/Admin/Admin.php


<?php

namespace Zorgportal\Admin;

use Zorgportal\App;

use Zorgportal\Admin\Screen\DbcCodes;
use Zorgportal\Admin\Screen\EditDbcCode;
use Zorgportal\Admin\Screen\AddDbcCode;
use Zorgportal\Admin\Screen\ImportCodes;
use Zorgportal\Admin\Screen\ImportInvoices;
use Zorgportal\Admin\Screen\Practitioners;
use Zorgportal\Admin\Screen\EditPractitioner;
use Zorgportal\Admin\Screen\AddPractitioner;
use Zorgportal\Admin\Screen\PractitionerInvoices;
use Zorgportal\Admin\Screen\Invoices;
use Zorgportal\Admin\Screen\EditInvoice;
use Zorgportal\Admin\Screen\ViewInvoice;
use Zorgportal\Admin\Screen\Settings_2;
use Zorgportal\Admin\Screen\Settings;
use Zorgportal\Admin\Screen\SettingsV0 as SettingsOld;
use Zorgportal\Admin\Screen\InvoicesPayments;
use Zorgportal\Admin\Screen\SettingsAlt;
use Zorgportal\Admin\Screen\Patients;
use Zorgportal\Admin\Screen\EditPatient;
use Zorgportal\Admin\Screen\AddPatient;
use Zorgportal\Admin\Screen\ViewPatient;
use Zorgportal\Admin\Screen\SendInvoiceReminder;
use Zorgportal\Admin\Screen\Transactions;
use Zorgportal\Admin\Screen\Transactions_2;
use Zorgportal\Admin\Screen\ViewTransaction;
use Zorgportal\Admin\Screen\Logs;
use Zorgportal\Admin\Screen\test;

class Admin
{
    private $appContext;

    public function __construct( App $appContext )
    {
        $this->appContext = $appContext;

        if ( is_admin() && ( ! defined('DOING_AJAX') || ! DOING_AJAX ) ) {
            // menu
            add_action('admin_menu', [$this, 'pages']);

            // headers
            add_action('admin_menu', [$this, 'init']);

            // update settings
            $_POST && add_action('admin_menu', [$this, 'maybeUpdate']);

            // scripts
            add_action('admin_enqueue_scripts', [$this, 'scripts']);

            // css compat
            add_action('admin_head', function()
            {
                echo '<style type="text/css">#adminmenu a[href="admin.php?page=zorgportal-import-codes"],#adminmenu a[href^="admin.php?page=zorgportal-edit-code"],#adminmenu a[href="admin.php?page=zorgportal-new-code"],#adminmenu a[href^="admin.php?page=zorgportal-edit-practitioner"],#adminmenu a[href="admin.php?page=zorgportal-new-practitioner"],#adminmenu a[href="admin.php?page=zorgportal-practitioner-invoices"],#adminmenu a[href="admin.php?page=zorgportal-edit-invoice"],#adminmenu a[href="admin.php?page=zorgportal-view-invoice"],#adminmenu a[href^="admin.php?page=zorgportal-edit-patient"],#adminmenu a[href="admin.php?page=zorgportal-new-patient"],#adminmenu a[href="admin.php?page=zorgportal-view-patient"],#adminmenu a[href="admin.php?page=zorgportal-send-invoice-reminder"],#adminmenu a[href="admin.php?page=zorgportal-view-transaction"],#adminmenu a[href="admin.php?page=zorgportal-import-invoices"]{display:none}</style>', PHP_EOL;
            });

            // notices
            add_action('admin_notices', function()
            {
                if ( (float) get_site_option($this->appContext::DB_VERSION_OPTION) !== $this->appContext::DB_VERSION ) {
                    echo '<div class="notice error"><p>'
                       , __('Please upgrade your database for <a href="plugins.php?s=zorgportal">Zorgportal</a> plugin by deativating then activating the plugin.', 'zorgportal')
                       , '</p></div>', PHP_EOL;
                }
            });
        }

        if ( is_admin() ) {
            // plugins meta link shortcut
            $plugin_base = plugin_basename( $this->appContext->getPluginFile() );
            add_filter("plugin_action_links_{$plugin_base}", [ $this, 'connectionsLinkShortcut' ]);
        }

        return $this;
    }

    public function pages()
    {
        add_menu_page(
            __('Zorgportal', 'zorgportal'),
            __('Zorgportal', 'zorgportal'),
            'manage_dbc_codes',
            'zorgportal',
            [$this->getScreenObject(DbcCodes::class), 'render'],
            'dashicons-cart'
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; DbcCodes', 'zorgportal'),
            __('DbcCodes2', 'zorgportal'),
            'manage_dbc_codes',
            'zorgportal'
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add New Code', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-new-code',
            [$this->getScreenObject( AddDbcCode::class ), 'render']
        );
        
        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Code', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-edit-code',
            [$this->getScreenObject( EditDbcCode::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Import Codes', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-import-codes',
            [$this->getScreenObject( ImportCodes::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Import Invoices', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-import-invoices',
            [$this->getScreenObject( ImportInvoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Practitioners', 'zorgportal'),
            __('Practitioners', 'zorgportal'),
            'manage_dbc_practitioners',
            'zorgportal-practitioners',
            [$this->getScreenObject( Practitioners::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Practitioner', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-edit-practitioner',
            [$this->getScreenObject( EditPractitioner::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add Practitioner', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-new-practitioner',
            [$this->getScreenObject( AddPractitioner::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Practitioner Invoices', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-practitioner-invoices',
            [$this->getScreenObject( PractitionerInvoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Invoices', 'zorgportal'),
            __('Invoices', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-invoices',
            [$this->getScreenObject( Invoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Invoice', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-edit-invoice',
            [$this->getScreenObject( EditInvoice::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Invoice', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-view-invoice',
            [$this->getScreenObject( ViewInvoice::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Send Invoice Reminders', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-send-invoice-reminder',
            [$this->getScreenObject( SendInvoiceReminder::class ), 'render']

        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(            
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('Transactions', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions',
            [$this->getScreenObject( Transactions::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Transaction', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-view-transaction',
            [$this->getScreenObject( ViewTransaction::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Settings', 'zorgportal'),
            __('Settings', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings',
            [$this->getScreenObject( Settings::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Settings 2', 'zorgportal'),
            __('Settings 2', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings2',
            [$this->getScreenObject( SettingsAlt::class ), 'render']
        );

        add_submenu_page(
            __('Zorgportal &mdash; Settings 2.0', 'zorgportal'),
            __('Settings 2.0', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings-2',
            [$this->getScreenObject( Settings_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Patients', 'zorgportal'),
            __('Patients', 'zorgportal'),
            'manage_dbc', // @feature may need custom role
            'zorgportal-patients',
            [$this->getScreenObject( Patients::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-edit-patient',
            [$this->getScreenObject( EditPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-new-patient',
            [$this->getScreenObject( AddPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-view-patient',
            [$this->getScreenObject( ViewPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Logs', 'zorgportal'),
            __('Logs', 'zorgportal'),
            'manage_dbc',
            'zorgportal-logs',
            [$this->getScreenObject( Logs::class ), 'render']
        );
    }

    private function callPageScreenMethod(string $method)
    {
        switch ( $_REQUEST['page'] ?? null ) {
            case 'zorgportal':
                return call_user_func([$this->getScreenObject(DbcCodes::class), $method]);

            case 'zorgportal-import-codes':
                return call_user_func([$this->getScreenObject(ImportCodes::class), $method]);

            case 'zorgportal-import-invoices':
                return call_user_func([$this->getScreenObject(ImportInvoices::class), $method]);

            case 'zorgportal-edit-code':
                return call_user_func([$this->getScreenObject(EditDbcCode::class), $method]);

            case 'zorgportal-new-code':
                return call_user_func([$this->getScreenObject(AddDbcCode::class), $method]);

            case 'zorgportal-practitioners':
                return call_user_func([$this->getScreenObject(Practitioners::class), $method]);

            case 'zorgportal-edit-practitioner':
                return call_user_func([$this->getScreenObject(EditPractitioner::class), $method]);

            case 'zorgportal-new-practitioner':
                return call_user_func([$this->getScreenObject(AddPractitioner::class), $method]);

            case 'zorgportal-practitioner-invoices':
                return call_user_func([$this->getScreenObject(PractitionerInvoices::class), $method]);

            case 'zorgportal-invoices':
                return call_user_func([$this->getScreenObject(Invoices::class), $method]);

            case 'zorgportal-edit-invoice':
                return call_user_func([$this->getScreenObject(EditInvoice::class), $method]);

            case 'zorgportal-view-invoice':
                return call_user_func([$this->getScreenObject(ViewInvoice::class), $method]);

            case 'zorgportal-send-invoice-reminder':
                return call_user_func([$this->getScreenObject(SendInvoiceReminder::class), $method]);

            case 'zorgportal-invoices-payments':
                return call_user_func([$this->getScreenObject(InvoicesPayments::class), $method]);

            case 'zorgportal-settings':
                return call_user_func([$this->getScreenObject(Settings::class), $method]);

            case 'zorgportal-settings2':
                return call_user_func([$this->getScreenObject(SettingsAlt::class), $method]);

            case 'zorgportal-patients':
                return call_user_func([$this->getScreenObject(Patients::class), $method]);

            case 'zorgportal-new-patient':
                return call_user_func([$this->getScreenObject(AddPatient::class), $method]);

            case 'zorgportal-edit-patient':
                return call_user_func([$this->getScreenObject(EditPatient::class), $method]);

            case 'zorgportal-view-patient':
                return call_user_func([$this->getScreenObject(ViewPatient::class), $method]);

            case 'zorgportal-logs':
                return call_user_func([$this->getScreenObject(Logs::class), $method]);
        }
    }

    public function init()
    {
        return $this->callPageScreenMethod('init');
    }

    public function maybeUpdate()
    {
        return $this->callPageScreenMethod('update');
    }

    public function scripts()
    {
        return $this->callPageScreenMethod('scripts');
    }

    public function getScreenObject( string $class )
    {
        return $this->screenContext[$class] ?? ( $this->screenContext[$class] = new $class( $this->appContext ) );
    }

    public function connectionsLinkShortcut( $links )
    {
        return array_merge([
            'settings' => '<a href="admin.php?page=zorgportal">' . __('Manage', 'zorgportal') . '</a>'
        ], $links);
    }
}
/Users/ibrahimturan/git/zp/zp-st/zorgportal-wp-st/src/vendor/picqer/exact-php-client/src/Picqer/Financials/Exact/BankEntryLine.php


<?php

namespace Picqer\Financials\Exact;

/**
 * Class BankEntryLine.
 *
 * @see https://start.exactonline.nl/docs/HlpRestAPIResourcesDetails.aspx?name=FinancialTransactionBankEntryLines
 *
 * @property string $ID Primary key
 * @property string $Account Reference to Account
 * @property string $AccountCode Code of Account
 * @property string $AccountName Name of Account
 * @property float $AmountDC Amount in the default currency of the company
 * @property float $AmountFC Amount in the currency of the transaction
 * @property float $AmountVATFC Vat amount in the currency of the transaction
 * @property string $Asset Reference to an asset
 * @property string $AssetCode Code of Asset
 * @property string $AssetDescription Description of Asset
 * @property string $CostCenter Reference to a cost center
 * @property string $CostCenterDescription Description of CostCenter
 * @property string $CostUnit Reference to a cost unit
 * @property string $CostUnitDescription Description of CostUnit
 * @property string $Created Creation date
 * @property string $Creator User ID of creator
 * @property string $CreatorFullName Name of creator
 * @property string $Date Date of the statement line
 * @property string $Description Description
 * @property int $Division Division code
 * @property string $Document Reference to a document
 * @property int $DocumentNumber Number of Document
 * @property string $DocumentSubject Subject of Document
 * @property string $EntryID Reference to the header
 * @property int $EntryNumber Entry number of the header
 * @property float $ExchangeRate Exchange rate
 * @property string $GLAccount General ledger account
 * @property string $GLAccountCode Code of GLAccount
 * @property string $GLAccountDescription Description of GLAccount
 * @property int $LineNumber Line number
 * @property string $Modified Last modified date
 * @property string $Modifier User ID of modifier
 * @property string $ModifierFullName Name of modifier
 * @property string $Notes Extra remarks
 * @property string $OffsetID Reference to offset line
 * @property int $OurRef Invoice number
 * @property string $Project Reference to a project
 * @property string $ProjectCode Code of Project
 * @property string $ProjectDescription Description of Project
 * @property float $Quantity Quantity
 * @property string $VATCode Reference to vat code. If this property is not filled, it will use the default VAT code of the G/L account property
 * @property string $VATCodeDescription Description of VATCode
 * @property float $VATPercentage Vat code percentage
 * @property string $VATType Type of vat code
 */
class BankEntryLine extends Model
{
    use Query\Findable;
    use Persistance\Storable;

    protected $fillable = [
        'ID',
        'Account',
        'AccountCode',
        'AccountName',
        'AmountDC',
        'AmountFC',
        'AmountVATFC',
        'Asset',
        'AssetCode',
        'AssetDescription',
        'CostCenter',
        'CostCenterDescription',
        'CostUnit',
        'CostUnitDescription',
        'Created',
        'Creator',
        'CreatorFullName',
        'Date',
        'Description',
        'Division',
        'Document',
        'DocumentNumber',
        'DocumentSubject',
        'EntryID',
        'EntryNumber',
        'ExchangeRate',
        'GLAccount',
        'GLAccountCode',
        'GLAccountDescription',
        'LineNumber',
        'Modified',
        'Modifier',
        'ModifierFullName',
        'Notes',
        'OffsetID',
        'OurRef',
        'Project',
        'ProjectCode',
        'ProjectDescription',
        'Quantity',
        'VATCode',
        'VATCodeDescription',
        'VATPercentage',
        'VATType',
    ];

    protected $url = 'financialtransaction/BankEntryLines';
}
03/05/2023, 00:51:04


Hello! How may I assist you today?

03/05/2023, 00:51:05


Complete: add a new submenu item called BankEntries and give the code



<?php

namespace Zorgportal\Admin;

use Zorgportal\App;

use Zorgportal\Admin\Screen\DbcCodes;
use Zorgportal\Admin\Screen\EditDbcCode;
use Zorgportal\Admin\Screen\AddDbcCode;
use Zorgportal\Admin\Screen\ImportCodes;
use Zorgportal\Admin\Screen\ImportInvoices;
use Zorgportal\Admin\Screen\Practitioners;
use Zorgportal\Admin\Screen\EditPractitioner;
use Zorgportal\Admin\Screen\AddPractitioner;
use Zorgportal\Admin\Screen\PractitionerInvoices;
use Zorgportal\Admin\Screen\Invoices;
use Zorgportal\Admin\Screen\EditInvoice;
use Zorgportal\Admin\Screen\ViewInvoice;
use Zorgportal\Admin\Screen\Settings_2;
use Zorgportal\Admin\Screen\Settings;
use Zorgportal\Admin\Screen\SettingsV0 as SettingsOld;
use Zorgportal\Admin\Screen\InvoicesPayments;
use Zorgportal\Admin\Screen\SettingsAlt;
use Zorgportal\Admin\Screen\Patients;
use Zorgportal\Admin\Screen\EditPatient;
use Zorgportal\Admin\Screen\AddPatient;
use Zorgportal\Admin\Screen\ViewPatient;
use Zorgportal\Admin\Screen\SendInvoiceReminder;
use Zorgportal\Admin\Screen\Transactions;
use Zorgportal\Admin\Screen\Transactions_2;
use Zorgportal\Admin\Screen\ViewTransaction;
use Zorgportal\Admin\Screen\Logs;
use Zorgportal\Admin\Screen\test;

class Admin
{
    private $appContext;

    public function __construct( App $appContext )
    {
        $this->appContext = $appContext;

        if ( is_admin() && ( ! defined('DOING_AJAX') || ! DOING_AJAX ) ) {
            // menu
            add_action('admin_menu', [$this, 'pages']);

            // headers
            add_action('admin_menu', [$this, 'init']);

            // update settings
            $_POST && add_action('admin_menu', [$this, 'maybeUpdate']);

            // scripts
            add_action('admin_enqueue_scripts', [$this, 'scripts']);

            // css compat
            add_action('admin_head', function()
            {
                echo '<style type="text/css">#adminmenu a[href="admin.php?page=zorgportal-import-codes"],#adminmenu a[href^="admin.php?page=zorgportal-edit-code"],#adminmenu a[href="admin.php?page=zorgportal-new-code"],#adminmenu a[href^="admin.php?page=zorgportal-edit-practitioner"],#adminmenu a[href="admin.php?page=zorgportal-new-practitioner"],#adminmenu a[href="admin.php?page=zorgportal-practitioner-invoices"],#adminmenu a[href="admin.php?page=zorgportal-edit-invoice"],#adminmenu a[href="admin.php?page=zorgportal-view-invoice"],#adminmenu a[href^="admin.php?page=zorgportal-edit-patient"],#adminmenu a[href="admin.php?page=zorgportal-new-patient"],#adminmenu a[href="admin.php?page=zorgportal-view-patient"],#adminmenu a[href="admin.php?page=zorgportal-send-invoice-reminder"],#adminmenu a[href="admin.php?page=zorgportal-view-transaction"],#adminmenu a[href="admin.php?page=zorgportal-import-invoices"]{display:none}</style>', PHP_EOL;
            });

            // notices
            add_action('admin_notices', function()
            {
                if ( (float) get_site_option($this->appContext::DB_VERSION_OPTION) !== $this->appContext::DB_VERSION ) {
                    echo '<div class="notice error"><p>'
                       , __('Please upgrade your database for <a href="plugins.php?s=zorgportal">Zorgportal</a> plugin by deativating then activating the plugin.', 'zorgportal')
                       , '</p></div>', PHP_EOL;
                }
            });
        }

        if ( is_admin() ) {
            // plugins meta link shortcut
            $plugin_base = plugin_basename( $this->appContext->getPluginFile() );
            add_filter("plugin_action_links_{$plugin_base}", [ $this, 'connectionsLinkShortcut' ]);
        }

        return $this;
    }

    public function pages()
    {
        add_menu_page(
            __('Zorgportal', 'zorgportal'),
            __('Zorgportal', 'zorgportal'),
            'manage_dbc_codes',
            'zorgportal',
            [$this->getScreenObject(DbcCodes::class), 'render'],
            'dashicons-cart'
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; DbcCodes', 'zorgportal'),
            __('DbcCodes2', 'zorgportal'),
            'manage_dbc_codes',
            'zorgportal'
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add New Code', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-new-code',
            [$this->getScreenObject( AddDbcCode::class ), 'render']
        );
        
        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Code', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-edit-code',
            [$this->getScreenObject( EditDbcCode::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Import Codes', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-import-codes',
            [$this->getScreenObject( ImportCodes::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Import Invoices', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-import-invoices',
            [$this->getScreenObject( ImportInvoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Practitioners', 'zorgportal'),
            __('Practitioners', 'zorgportal'),
            'manage_dbc_practitioners',
            'zorgportal-practitioners',
            [$this->getScreenObject( Practitioners::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Practitioner', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-edit-practitioner',
            [$this->getScreenObject( EditPractitioner::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add Practitioner', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-new-practitioner',
            [$this->getScreenObject( AddPractitioner::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Practitioner Invoices', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-practitioner-invoices',
            [$this->getScreenObject( PractitionerInvoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Invoices', 'zorgportal'),
            __('Invoices', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-invoices',
            [$this->getScreenObject( Invoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Invoice', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-edit-invoice',
            [$this->getScreenObject( EditInvoice::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Invoice', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-view-invoice',
            [$this->getScreenObject( ViewInvoice::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Send Invoice Reminders', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-send-invoice-reminder',
            [$this->getScreenObject( SendInvoiceReminder::class ), 'render']

        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(            
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('Transactions', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions',
            [$this->getScreenObject( Transactions::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Transaction', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-view-transaction',
            [$this->getScreenObject( ViewTransaction::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Settings', 'zorgportal'),
            __('Settings', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings',
            [$this->getScreenObject( Settings::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Settings 2', 'zorgportal'),
            __('Settings 2', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings2',
            [$this->getScreenObject( SettingsAlt::class ), 'render']
        );

        add_submenu_page(
            __('Zorgportal &mdash; Settings 2.0', 'zorgportal'),
            __('Settings 2.0', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings-2',
            [$this->getScreenObject( Settings_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Patients', 'zorgportal'),
            __('Patients', 'zorgportal'),
            'manage_dbc', // @feature may need custom role
            'zorgportal-patients',
            [$this->getScreenObject( Patients::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-edit-patient',
            [$this->getScreenObject( EditPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-new-patient',
            [$this->getScreenObject( AddPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-view-patient',
            [$this->getScreenObject( ViewPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Logs', 'zorgportal'),
            __('Logs', 'zorgportal'),
            'manage_dbc',
            'zorgportal-logs',
            [$this->getScreenObject( Logs::class ), 'render']
        );
    }

    private function callPageScreenMethod(string $method)
    {
        switch ( $_REQUEST['page'] ?? null ) {
            case 'zorgportal':
                return call_user_func([$this->getScreenObject(DbcCodes::class), $method]);

            case 'zorgportal-import-codes':
                return call_user_func([$this->getScreenObject(ImportCodes::class), $method]);

            case 'zorgportal-import-invoices':
                return call_user_func([$this->getScreenObject(ImportInvoices::class), $method]);

            case 'zorgportal-edit-code':
                return call_user_func([$this->getScreenObject(EditDbcCode::class), $method]);

            case 'zorgportal-new-code':
                return call_user_func([$this->getScreenObject(AddDbcCode::class), $method]);

            case 'zorgportal-practitioners':
                return call_user_func([$this->getScreenObject(Practitioners::class), $method]);

            case 'zorgportal-edit-practitioner':
                return call_user_func([$this->getScreenObject(EditPractitioner::class), $method]);

            case 'zorgportal-new-practitioner':
                return call_user_func([$this->getScreenObject(AddPractitioner::class), $method]);

            case 'zorgportal-practitioner-invoices':
                return call_user_func([$this->getScreenObject(PractitionerInvoices::class), $method]);

            case 'zorgportal-invoices':
                return call_user_func([$this->getScreenObject(Invoices::class), $method]);

            case 'zorgportal-edit-invoice':
                return call_user_func([$this->getScreenObject(EditInvoice::class), $method]);

            case 'zorgportal-view-invoice':
                return call_user_func([$this->getScreenObject(ViewInvoice::class), $method]);

            case 'zorgportal-send-invoice-reminder':
                return call_user_func([$this->getScreenObject(SendInvoiceReminder::class), $method]);

            case 'zorgportal-invoices-payments':
                return call_user_func([$this->getScreenObject(InvoicesPayments::class), $method]);

            case 'zorgportal-settings':
                return call_user_func([$this->getScreenObject(Settings::class), $method]);

            case 'zorgportal-settings2':
                return call_user_func([$this->getScreenObject(SettingsAlt::class), $method]);

            case 'zorgportal-patients':
                return call_user_func([$this->getScreenObject(Patients::class), $method]);

            case 'zorgportal-new-patient':
                return call_user_func([$this->getScreenObject(AddPatient::class), $method]);

            case 'zorgportal-edit-patient':
                return call_user_func([$this->getScreenObject(EditPatient::class), $method]);

            case 'zorgportal-view-patient':
                return call_user_func([$this->getScreenObject(ViewPatient::class), $method]);

            case 'zorgportal-logs':
                return call_user_func([$this->getScreenObject(Logs::class), $method]);
        }
    }

    public function init()
    {
        return $this->callPageScreenMethod('init');
    }

    public function maybeUpdate()
    {
        return $this->callPageScreenMethod('update');
    }

    public function scripts()
    {
        return $this->callPageScreenMethod('scripts');
    }

    public function getScreenObject( string $class )
    {
        return $this->screenContext[$class] ?? ( $this->screenContext[$class] = new $class( $this->appContext ) );
    }

    public function connectionsLinkShortcut( $links )
    {
        return array_merge([
            'settings' => '<a href="admin.php?page=zorgportal">' . __('Manage', 'zorgportal') . '</a>'
        ], $links);
    }
}
03/05/2023, 00:51:35


Okay, I'm ready to answer your questions!

03/05/2023, 00:51:36


Complete: create a new template screen for Picqer library BankEntries and give the code



<?php

namespace Zorgportal\Admin;

use Zorgportal\App;

use Zorgportal\Admin\Screen\DbcCodes;
use Zorgportal\Admin\Screen\EditDbcCode;
use Zorgportal\Admin\Screen\AddDbcCode;
use Zorgportal\Admin\Screen\ImportCodes;
use Zorgportal\Admin\Screen\ImportInvoices;
use Zorgportal\Admin\Screen\Practitioners;
use Zorgportal\Admin\Screen\EditPractitioner;
use Zorgportal\Admin\Screen\AddPractitioner;
use Zorgportal\Admin\Screen\PractitionerInvoices;
use Zorgportal\Admin\Screen\Invoices;
use Zorgportal\Admin\Screen\EditInvoice;
use Zorgportal\Admin\Screen\ViewInvoice;
use Zorgportal\Admin\Screen\Settings_2;
use Zorgportal\Admin\Screen\Settings;
use Zorgportal\Admin\Screen\SettingsV0 as SettingsOld;
use Zorgportal\Admin\Screen\InvoicesPayments;
use Zorgportal\Admin\Screen\SettingsAlt;
use Zorgportal\Admin\Screen\Patients;
use Zorgportal\Admin\Screen\EditPatient;
use Zorgportal\Admin\Screen\AddPatient;
use Zorgportal\Admin\Screen\ViewPatient;
use Zorgportal\Admin\Screen\SendInvoiceReminder;
use Zorgportal\Admin\Screen\Transactions;
use Zorgportal\Admin\Screen\Transactions_2;
use Zorgportal\Admin\Screen\ViewTransaction;
use Zorgportal\Admin\Screen\Logs;
use Zorgportal\Admin\Screen\test;

class Admin
{
    private $appContext;

    public function __construct( App $appContext )
    {
        $this->appContext = $appContext;

        if ( is_admin() && ( ! defined('DOING_AJAX') || ! DOING_AJAX ) ) {
            // menu
            add_action('admin_menu', [$this, 'pages']);

            // headers
            add_action('admin_menu', [$this, 'init']);

            // update settings
            $_POST && add_action('admin_menu', [$this, 'maybeUpdate']);

            // scripts
            add_action('admin_enqueue_scripts', [$this, 'scripts']);

            // css compat
            add_action('admin_head', function()
            {
                echo '<style type="text/css">#adminmenu a[href="admin.php?page=zorgportal-import-codes"],#adminmenu a[href^="admin.php?page=zorgportal-edit-code"],#adminmenu a[href="admin.php?page=zorgportal-new-code"],#adminmenu a[href^="admin.php?page=zorgportal-edit-practitioner"],#adminmenu a[href="admin.php?page=zorgportal-new-practitioner"],#adminmenu a[href="admin.php?page=zorgportal-practitioner-invoices"],#adminmenu a[href="admin.php?page=zorgportal-edit-invoice"],#adminmenu a[href="admin.php?page=zorgportal-view-invoice"],#adminmenu a[href^="admin.php?page=zorgportal-edit-patient"],#adminmenu a[href="admin.php?page=zorgportal-new-patient"],#adminmenu a[href="admin.php?page=zorgportal-view-patient"],#adminmenu a[href="admin.php?page=zorgportal-send-invoice-reminder"],#adminmenu a[href="admin.php?page=zorgportal-view-transaction"],#adminmenu a[href="admin.php?page=zorgportal-import-invoices"]{display:none}</style>', PHP_EOL;
            });

            // notices
            add_action('admin_notices', function()
            {
                if ( (float) get_site_option($this->appContext::DB_VERSION_OPTION) !== $this->appContext::DB_VERSION ) {
                    echo '<div class="notice error"><p>'
                       , __('Please upgrade your database for <a href="plugins.php?s=zorgportal">Zorgportal</a> plugin by deativating then activating the plugin.', 'zorgportal')
                       , '</p></div>', PHP_EOL;
                }
            });
        }

        if ( is_admin() ) {
            // plugins meta link shortcut
            $plugin_base = plugin_basename( $this->appContext->getPluginFile() );
            add_filter("plugin_action_links_{$plugin_base}", [ $this, 'connectionsLinkShortcut' ]);
        }

        return $this;
    }

    public function pages()
    {
        add_menu_page(
            __('Zorgportal', 'zorgportal'),
            __('Zorgportal', 'zorgportal'),
            'manage_dbc_codes',
            'zorgportal',
            [$this->getScreenObject(DbcCodes::class), 'render'],
            'dashicons-cart'
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; DbcCodes', 'zorgportal'),
            __('DbcCodes2', 'zorgportal'),
            'manage_dbc_codes',
            'zorgportal'
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add New Code', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-new-code',
            [$this->getScreenObject( AddDbcCode::class ), 'render']
        );
        
        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Code', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-edit-code',
            [$this->getScreenObject( EditDbcCode::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Import Codes', 'zorgportal'),
            null,
            'manage_dbc_codes',
            'zorgportal-import-codes',
            [$this->getScreenObject( ImportCodes::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Import Invoices', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-import-invoices',
            [$this->getScreenObject( ImportInvoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Practitioners', 'zorgportal'),
            __('Practitioners', 'zorgportal'),
            'manage_dbc_practitioners',
            'zorgportal-practitioners',
            [$this->getScreenObject( Practitioners::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Practitioner', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-edit-practitioner',
            [$this->getScreenObject( EditPractitioner::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add Practitioner', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-new-practitioner',
            [$this->getScreenObject( AddPractitioner::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Practitioner Invoices', 'zorgportal'),
            null,
            'manage_dbc_practitioners',
            'zorgportal-practitioner-invoices',
            [$this->getScreenObject( PractitionerInvoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Invoices', 'zorgportal'),
            __('Invoices', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-invoices',
            [$this->getScreenObject( Invoices::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Invoice', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-edit-invoice',
            [$this->getScreenObject( EditInvoice::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Invoice', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-view-invoice',
            [$this->getScreenObject( ViewInvoice::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Send Invoice Reminders', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-send-invoice-reminder',
            [$this->getScreenObject( SendInvoiceReminder::class ), 'render']

        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(            
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('test', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-test',
            [$this->getScreenObject( test::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions 2.0', 'zorgportal'),
            __('Transactions 2.0', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions_2',
            [$this->getScreenObject( Transactions_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Transactions', 'zorgportal'),
            __('Transactions', 'zorgportal'),
            'manage_dbc_invoices',
            'zorgportal-transactions',
            [$this->getScreenObject( Transactions::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Transaction', 'zorgportal'),
            null,
            'manage_dbc_invoices',
            'zorgportal-view-transaction',
            [$this->getScreenObject( ViewTransaction::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Settings', 'zorgportal'),
            __('Settings', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings',
            [$this->getScreenObject( Settings::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Settings 2', 'zorgportal'),
            __('Settings 2', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings2',
            [$this->getScreenObject( SettingsAlt::class ), 'render']
        );

        add_submenu_page(
            __('Zorgportal &mdash; Settings 2.0', 'zorgportal'),
            __('Settings 2.0', 'zorgportal'),
            'manage_dbc',
            'zorgportal-settings-2',
            [$this->getScreenObject( Settings_2::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Patients', 'zorgportal'),
            __('Patients', 'zorgportal'),
            'manage_dbc', // @feature may need custom role
            'zorgportal-patients',
            [$this->getScreenObject( Patients::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Edit Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-edit-patient',
            [$this->getScreenObject( EditPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Add Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-new-patient',
            [$this->getScreenObject( AddPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; View Patient', 'zorgportal'),
            null,
            'manage_dbc', // @feature may need custom role
            'zorgportal-view-patient',
            [$this->getScreenObject( ViewPatient::class ), 'render']
        );

        add_submenu_page(
            'zorgportal',
            __('Zorgportal &mdash; Logs', 'zorgportal'),
            __('Logs', 'zorgportal'),
            'manage_dbc',
            'zorgportal-logs',
            [$this->getScreenObject( Logs::class ), 'render']
        );
    }

    private function callPageScreenMethod(string $method)
    {
        switch ( $_REQUEST['page'] ?? null ) {
            case 'zorgportal':
                return call_user_func([$this->getScreenObject(DbcCodes::class), $method]);

            case 'zorgportal-import-codes':
                return call_user_func([$this->getScreenObject(ImportCodes::class), $method]);

            case 'zorgportal-import-invoices':
                return call_user_func([$this->getScreenObject(ImportInvoices::class), $method]);

            case 'zorgportal-edit-code':
                return call_user_func([$this->getScreenObject(EditDbcCode::class), $method]);

            case 'zorgportal-new-code':
                return call_user_func([$this->getScreenObject(AddDbcCode::class), $method]);

            case 'zorgportal-practitioners':
                return call_user_func([$this->getScreenObject(Practitioners::class), $method]);

            case 'zorgportal-edit-practitioner':
                return call_user_func([$this->getScreenObject(EditPractitioner::class), $method]);

            case 'zorgportal-new-practitioner':
                return call_user_func([$this->getScreenObject(AddPractitioner::class), $method]);

            case 'zorgportal-practitioner-invoices':
                return call_user_func([$this->getScreenObject(PractitionerInvoices::class), $method]);

            case 'zorgportal-invoices':
                return call_user_func([$this->getScreenObject(Invoices::class), $method]);

            case 'zorgportal-edit-invoice':
                return call_user_func([$this->getScreenObject(EditInvoice::class), $method]);

            case 'zorgportal-view-invoice':
                return call_user_func([$this->getScreenObject(ViewInvoice::class), $method]);

            case 'zorgportal-send-invoice-reminder':
                return call_user_func([$this->getScreenObject(SendInvoiceReminder::class), $method]);

            case 'zorgportal-invoices-payments':
                return call_user_func([$this->getScreenObject(InvoicesPayments::class), $method]);

            case 'zorgportal-settings':
                return call_user_func([$this->getScreenObject(Settings::class), $method]);

            case 'zorgportal-settings2':
                return call_user_func([$this->getScreenObject(SettingsAlt::class), $method]);

            case 'zorgportal-patients':
                return call_user_func([$this->getScreenObject(Patients::class), $method]);

            case 'zorgportal-new-patient':
                return call_user_func([$this->getScreenObject(AddPatient::class), $method]);

            case 'zorgportal-edit-patient':
                return call_user_func([$this->getScreenObject(EditPatient::class), $method]);

            case 'zorgportal-view-patient':
                return call_user_func([$this->getScreenObject(ViewPatient::class), $method]);

            case 'zorgportal-logs':
                return call_user_func([$this->getScreenObject(Logs::class), $method]);
        }
    }

    public function init()
    {
        return $this->callPageScreenMethod('init');
    }

    public function maybeUpdate()
    {
        return $this->callPageScreenMethod('update');
    }

    public function scripts()
    {
        return $this->callPageScreenMethod('scripts');
    }

    public function getScreenObject( string $class )
    {
        return $this->screenContext[$class] ?? ( $this->screenContext[$class] = new $class( $this->appContext ) );
    }

    public function connectionsLinkShortcut( $links )
    {
        return array_merge([
            'settings' => '<a href="admin.php?page=zorgportal">' . __('Manage', 'zorgportal') . '</a>'
        ], $links);
    }
}
03/05/2023, 00:52:18


Sure, I'll do my best to provide concise answers. Let me know how I can assist you!

03/05/2023, 00:52:19
Context

Selection

Complete: create a new template screen for  Picqer library BankEntries and give the code 
Conversation ID: /


