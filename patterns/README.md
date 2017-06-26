# Patterns

Each pattern must have a `mustache` template, a `json` data file and a `json` schema. These are found in `source/_patterns`.

It may also have associated styles, images and JavaScript, found in the respective directories within `source/`. (Note that for simplicity all the styles for all patterns are in one file, `styles.css`. It is recommended that for a real-world implementation each pattern has its own style file.) 

# Building patterns

 - Every time a `mustache` or `json` data file is added/modified/deleted, the patterns need to be rebuilt. Use:
    - `php ./core/builder.php --generate` for a one-off rebuild,
    
    or
    
    - `php ./core/builder.php --watch` to set up a watch task that will rebuild patterns automatically when one of these file types is added/modified/deleted.

# Validating patterns

Before committing, ensure that the templates and data gobey the schema by running `./bin/validate`. 
