const redis = require('redis');
const client = redis.createClient({ url: 'redis://redis:6379' });

client.on('error', err => console.log('❌ Redis Error:', err));

async function start() {
    await client.connect();
    console.log('✅ Connected to Redis - Waiting for Laravel...');

    // We use .subscribe and provide a callback
    await client.subscribe('test-channel', (message) => {
        console.log('📢 NEW MESSAGE FROM LARAVEL:', message);
    });
}

start();