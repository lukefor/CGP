<?php

# collectd version
$CONFIG['version'] = 5;

# collectd's datadir
$CONFIG['datadir'] = '/var/lib/collectd/rrd';

# location of the types.db file
$CONFIG['typesdb'][] = '/usr/share/collectd/types.db';

# rrdtool executable
$CONFIG['rrdtool'] = '/usr/bin/rrdtool';

# rrdtool special command-line options
$CONFIG['rrdtool_opts'] = array();

# category of hosts to show on main page
#$CONFIG['cat']['category1'] = array('host1', 'host2');

# category of hosts based on regular expression
#$CONFIG['cat']['Mailservers'] = '/mail\d+/';

# default plugins to show on host page
$CONFIG['overview'] = array('load', 'interface', 'memory', 'swap', 'sensors', 'uptime', 'df', 'disk', 'smart');

# example of filter to show only the if_octets of eth0 on host page
# (interface must be enabled in the overview config array)
$CONFIG['overview_filter']['interface'] = [
 ['pi' => 'eth0', 't' => 'if_octets'],
 ['pi' => 'enp4s0', 't' => 'if_octets'],
 ['pi' => 'venet0', 't' => 'if_octets'],
 ['pi' => 'ens3', 't' => 'if_octets'],
 ['pi' => 'eno1', 't' => 'if_octets']
];
$CONFIG['overview_filter']['smart'] = [
	['t' => 'smart_badsectors'],
	['t' => 'nvme_percent_used'],
	['t' => 'nvme_media_errors'],
];
$CONFIG['overview_filter']['disk'] = [
 ['pi' => 'sda', 't' => 'disk_octets'],
 ['pi' => 'sdb', 't' => 'disk_octets'],
 ['pi' => 'sdc', 't' => 'disk_octets'],
 ['pi' => 'sdd', 't' => 'disk_octets'],
 ['pi' => 'sde', 't' => 'disk_octets'],
 ['pi' => 'sdf', 't' => 'disk_octets'],
 ['pi' => 'vda', 't' => 'disk_octets'],
 ['pi' => 'nvme0n1', 't' => 'disk_octets'],
 ['pi' => 'nvme1n1', 't' => 'disk_octets'],
 ['pi' => 'md127p3', 't' => 'disk_octets'],
 ['pi' => 'md127p3', 't' => 'disk_ops'],
 ['pi' => 'md127p3', 't' => 'pending_operations'],
];
$CONFIG['overview_filter']['sensors'] = [array('t' => 'coretemp-isa-0000'), ['t' => 'temperature']];

# default plugins time range
$CONFIG['time_range']['default'] = 86400 * 7;
$CONFIG['time_range']['uptime']  = 86400 * 31 * 3;

# show load averages and used memory on overview page
$CONFIG['showload'] = true;
$CONFIG['showmem'] = true;
$CONFIG['showtime'] = false;

$CONFIG['term'] = array(
	'2hour'	 => 3600 * 2,
	'8hour'	 => 3600 * 8,
	'day'	 => 86400,
	'week'	 => 86400 * 7,
	'month'	 => 86400 * 31,
	'quarter'=> 86400 * 31 * 3,
	'year'	 => 86400 * 365,
);

# show graphs in bits or bytes
$CONFIG['network_datasize'] = 'bytes';

# "png", "svg", "canvas" or "hybrid" (canvas on detail page, png on the others) graphs
$CONFIG['graph_type'] = 'hybrid';

# For canvas graphs, use 'async' or 'sync' fetch method
$CONFIG['rrd_fetch_method'] = 'async';

# use the negative X-axis in I/O graphs
$CONFIG['negative_io'] = false;

# add XXth percentile line + legend to network graphs
# false = disabled; 95 = 95th percentile
$CONFIG['percentile'] = 95;

# create smooth graphs (rrdtool -E)
$CONFIG['graph_smooth'] = true;

# draw min/max spikes in a lighter color in graphs with type default
$CONFIG['graph_minmax'] = false;

# The URL that provides RRD files for the "canvas" graph type. Examples:
# 'rrd/{file}' is replaced by 'rrd/example.com/load/load.rrd'
# 'rrd.php?path={file_escaped}' becomes 'rrd.php?path=host%3Fload%3Fload.rrd'
$CONFIG['rrd_url'] = 'rrd/{file_escaped}';

# browser cache time for the graphs (in seconds)
$CONFIG['cache'] = 10;

# page refresh (in seconds)
$CONFIG['page_refresh'] = '';

# default width/height of the graphs
$CONFIG['width'] = 420;
$CONFIG['height'] = 190;
# default width/height of detailed graphs
$CONFIG['detail-width'] = 800;
$CONFIG['detail-height'] = 350;
# max width/height of a graph (to prevent from OOM)
$CONFIG['max-width'] = $CONFIG['detail-width'] * 2;
$CONFIG['max-height'] = $CONFIG['detail-height'] * 2;

# collectd's unix socket (unixsock plugin)
# enabled: 'unix:///var/run/collectd-unixsock'
# enabled (rrdcached): 'unix:///var/run/rrdcached.sock'
# disabled: NULL
$CONFIG['socket'] = 'unix:///var/run/collectd-unixsock';

# flush rrd data to disk using "collectd" (unixsock plugin)
# or a "rrdcached" server
$CONFIG['flush_type'] = 'collectd';

# system default timezone when not set
$CONFIG['default_timezone'] = 'UTC';

# hide graphs not updated within x seconds ago
$CONFIG['filter_age'] = 86400 * 3;

# load local configuration
if (file_exists(dirname(__FILE__).'/config.local.php'))
	include_once 'config.local.php';
