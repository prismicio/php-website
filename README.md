## Prismic & PHP Multi-Page site with navigation Example

[## Check out the dedicated article to get this project up and running
> [Prismic project guide](https://user-guides.prismic.io/en/articles/868744-sample-multi-page-site-with-navigation-in-php)


## 1. Install the prismic-cli
```
npm install -g prismic-cli
```

## 2. Run the theme command
This will create a new Prismic content repository, setup the custom types, and install the project code
```
prismic theme --theme-url https://github.com/prismicio/php-website --conf prismic-configuration.json
```

## 3. Update your repo name
Open your `config.php` file and update your-repo-name with your repository name

```
define('PRISMIC_URL', 'https://your-repo-name.prismic.io/api/v2');
```
## 4. Run the project
```
composer install
./serve.sh  
```
Then you can access it at [http://localhost:3000](http://localhost:3000).

### Learn more about using Prismic with PHP

[Prismic + PHP documentation](https://prismic.io/docs/technologies/getting-started-php).

### License

This software is licensed under the Apache 2 license, quoted below.

Copyright 2021 [Prismic](http://prismic.io/).

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this project except in compliance with the License. You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0.

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
