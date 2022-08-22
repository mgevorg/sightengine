1. Create .env from .env.example
2. Change SIGHTENGINE_API_USER and SIGHTENGINE_API_SECRET
3. php artisan migrate
4. run worker: php artisan queue:work
4. usage examples
app('external.sightengine-service')->checkText("cazzo Porca Eva", 'standard');
app('external.sightengine-service')->checkVideo("https://file-examples.com/storage/fe5467a6a163010b197fb20/2017/04/file_example_MP4_480_1_5MG.mp4", 'nudity');
app('external.sightengine-service')->checkImage("https://image.shutterstock.com/image-photo/word-example-written-on-magnifying-260nw-1883859943.jpg", 'nudity,wad,offensive,text-content,gore,text,qr-content');
5. Or just use MainController@test at /test