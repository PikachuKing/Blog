/**
 * Defines the API route we are using.
 */
var api_url = '';
var app_url = '';

switch( process.env.NODE_ENV ){
    case 'development':
        api_url = '/api/v1';
        app_url = '/';
        break;
    case 'production':
        api_url = '/api/v1';
        app_url = '/';
        break;
}

export const BLOG_CONFIG = {
    API_URL: api_url,
    APP_URL: app_url,
};
