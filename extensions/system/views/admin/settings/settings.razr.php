@script('settings', 'system/js/settings/settings.js', 'requirejs')

<form class="uk-form uk-form-horizontal uk-grid" action="@url('@system/settings/save')" method="post" data-uk-grid-margin data-uk-grid-match>

    <div class="pk-sidebar uk-width-medium-1-4">

        <ul class="uk-nav uk-nav-side" data-tabs="@tab">
            <li><a href="#">@trans('Site')</a></li>
            <li><a href="#">@trans('Email')</a></li>
            <li><a href="#">@trans('Localization')</a></li>
            <li><a href="#">@trans('System')</a></li>
        </ul>

    </div>
    <div class="pk-content uk-width-medium-3-4">

        <ul id="tab-content" class="uk-switcher uk-margin">
            <li>

                <h2 class="pk-form-heading">@trans('Site')</h2>
                <div class="uk-form-row">
                    <label for="form-title" class="uk-form-label">@trans('Title')</label>
                    <div class="uk-form-controls">
                        <input id="form-title" class="uk-form-width-large" type="text" name="option[system:app.site_title]" value="@option.get('system:app.site_title')">
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="form-description" class="uk-form-label">@trans('Description')</label>
                    <div class="uk-form-controls">
                        <textarea id="form-description" class="uk-form-width-large" name="option[system:app.site_description]" rows="5">@option.get('system:app.site_description')</textarea>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="form-frontpage" class="uk-form-label">@trans('Front Page')</label>
                    <div class="uk-form-controls">
                        <input id="form-frontpage" class="uk-form-width-large" type="text" name="option[system:app.frontpage]" value="@option.get('system:app.frontpage')">
                        <span class="js-resolved-url uk-text-muted"></span>
                        <p class="uk-form-help-block">@trans('Optionally, pick a URL to display as the front page.')</p>
                    </div>
                </div>
                <div class="uk-form-row">
                    <span class="uk-form-label">@trans('Maintenance')</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" name="option[system:maintenance.enabled]" value="1" @(option.get('system:maintenance.enabled') ? 'checked':'')> @trans('Put the site offline and show the offline message.')</label>
                        </p>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="form-offlinemessage" class="uk-form-label">@trans('Offline Message')</label>
                    <div class="uk-form-controls">
                        <textarea id="form-offlinemessage" class="uk-form-width-large" name="option[system:maintenance.msg]" placeholder="@trans("We'll be back soon.")" rows="5">@option.get('system:maintenance.msg')</textarea>
                    </div>
                </div>

            </li>
            <li>

                <h2 class="pk-form-heading">@trans('Email')</h2>
                <div class="uk-form-row" data-email>
                    <label for="form-emailenabled" class="uk-form-label">@trans('Send Email')</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input id="form-emailenabled" type="checkbox" name="option[system:mail.enabled]" value="1" @(option.get('system:mail.enabled') ? 'checked':'')> @trans('Enable mail sending.')</label>
                        </p>
                    </div>
                </div>
                <div class="uk-form-row" data-email>
                    <label for="form-emailaddress" class="uk-form-label">@trans('From Email')</label>
                    <div class="uk-form-controls">
                        <input id="form-emailaddress" class="uk-form-width-large" type="text" name="option[system:mail.from.address]" value="@option.get('system:mail.from.address')">
                    </div>
                </div>
                <div class="uk-form-row" data-email>
                    <label for="form-fromname" class="uk-form-label">@trans('From Name')</label>
                    <div class="uk-form-controls">
                        <input id="form-fromname" class="uk-form-width-large" type="text" name="option[system:mail.from.name]" value="@option.get('system:mail.from.name')">
                    </div>
                </div>
                <div class="uk-form-row" data-email>
                    <label for="form-mailer" class="uk-form-label">@trans('Mailer')</label>
                    <div class="uk-form-controls">
                        <select id="form-mailer" class="uk-form-width-large" name="option[system:mail.driver]">
                            @foreach (['mail' => trans('PHP Mailer'), 'smtp' => trans('SMTP Mailer')] as key => name)
                            <option value="@key"@( key == option.get('system:mail.driver') ? ' selected' )>@name</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="uk-form-row" data-smtp data-email>
                    <div class="uk-form-row">
                        <label for="form-smtpport" class="uk-form-label">@trans('SMTP Port')</label>
                        <div class="uk-form-controls">
                            <input id="form-smtpport" class="uk-form-width-large" type="text" name="option[system:mail.port]" value="@option.get('system:mail.port')">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label for="form-smtphost" class="uk-form-label">@trans('SMTP Host')</label>
                        <div class="uk-form-controls">
                            <input id="form-smtphost" class="uk-form-width-large" type="text" name="option[system:mail.host]" value="@option.get('system:mail.host')">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label for="form-smtpuser" class="uk-form-label">@trans('SMTP User')</label>
                        <div class="uk-form-controls">
                            <input id="form-smtpuser" class="uk-form-width-large" type="text" name="option[system:mail.username]" value="@option.get('system:mail.username')">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label for="form-smtppassword" class="uk-form-label">@trans('SMTP Password')</label>
                        <div class="uk-form-controls js-password">
                            <div class="uk-form-password">
                                <input id="form-smtppassword" class="uk-form-width-large" type="password" name="option[system:mail.password]" value="@option.get('system:mail.password')">
                                <a href="" class="uk-form-password-toggle" data-uk-form-password>@trans('Show')</a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label for="form-smtpencryption" class="uk-form-label">@trans('SMTP Encryption')</label>
                        <div class="uk-form-controls">
                            <select id="form-smtpencryption" class="uk-form-width-large" name="option[system:mail.encryption]">
                                <option value="">@trans('None')</option>
                                @foreach (['ssl' => trans('SSL'), 'tls' => trans('TLS')] as key => name)
                                <option value="@key"@( !ssl ? 'disabled' ) @( key == option.get('system:mail.encryption') ? ' selected')>@name</option>
                                @endforeach
                            </select>
                            @if (!ssl)
                            <p class="uk-form-help-block">@trans('Please enable the PHP Open SSL extension.')</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="uk-form-row">
                    <div class="uk-form-controls">
                        <button type="button" class="uk-button" data-smtp data-smtp-test="@url('@system/settings/testsmtpconnection')">@trans('Check Connection')</button>
                        <button type="button" class="uk-button" data-mail-test="@url('@system/settings/testsendemail')">@trans('Send Test Email')</button>
                    </div>
                </div>

            </li>
            <li>

                <h2 class="pk-form-heading">@trans('Localization')</h2>
                <div class="uk-form-row">
                    <label for="form-sitelocale" class="uk-form-label">@trans('Site Locale')</label>
                    <div class="uk-form-controls">
                        <select id="form-sitelocale" class="uk-form-width-large" name="option[system:app.locale]">
                            @foreach (locales as value => name)
                            <option value="@value"@(value == option.get('system:app.locale') ? ' selected')>@name</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="form-adminlocale" class="uk-form-label">@trans('Admin Locale')</label>
                    <div class="uk-form-controls">
                        <select id="form-adminlocale" class="uk-form-width-large" name="option[system:app.locale_admin]">
                            @foreach (locales as value => name)
                            <option value="@value"@(value == option.get('system:app.locale_admin') ? ' selected')>@name</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="form-timezone" class="uk-form-label">@trans('Time Zone')</label>
                    <div class="uk-form-controls">
                        <select id="form-timezone" class="uk-form-width-large" name="option[system:app.timezone]">
                            <option value="UTC"@( 'UTC' == option.get('system:app.timezone', 'UTC') ? ' selected' )>@trans('UTC')</option>
                            @foreach (timezones|slice(0, timezones|length - 1) as region => rtimezones)
                            <optgroup label="@region">
                                @foreach (rtimezones as value => name)
                                <option value="@value"@( value == option.get('system:app.timezone', 'UTC') ? ' selected' )>@name</option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>

            </li>
            <li>

                <h2 class="pk-form-heading">@trans('System')</h2>
                <div class="uk-form-row">
                    <label for="form-apikey" class="uk-form-label">@trans('API Key')</label>
                    <div class="uk-form-controls">
                        <textarea id="form-apikey" class="uk-form-width-large" name="option[system:api.key]" placeholder="@trans('Enter your API key')" rows="6">@option.get('system:api.key')</textarea>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="form-uploadfolder" class="uk-form-label">@trans('Storage')</label>
                    <div class="uk-form-controls">
                        <input id="form-uploadfolder" class="uk-form-width-large" type="text" name="option[system:app.storage]" value="@option.get('system:app.storage')" placeholder="@app.config.app.storage">
                    </div>
                </div>
                <div class="uk-form-row">
                    <span class="uk-form-label">@trans('Cache')</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        @foreach (caches as id => info)
                        <p class="uk-form-controls-condensed">
                            <label><input type="radio" name="config[cache.storage]" value="@id"@(cache == id ? ' checked')@(!info['supported'] ? ' disabled')> @info['name']</label>
                        </p>
                        @endforeach
                    </div>
                </div>
                <div class="uk-form-row">
                    <span class="uk-form-label">@trans('Developer')</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" name="config[app.debug]" value="1"@(config.app.debug ? ' checked')> @trans('Enable debug mode')</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" name="config[profiler.enabled]" value="1"@(config.profiler.enabled ? ' checked')> @trans('Enable profiler toolbar')</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" name="config[app.nocache]" value="1"@(config.app.nocache ? ' checked')> @trans('Disable cache')</label>
                        </p>
                    </div>
                </div>

            </li>
        </ul>

        <p>
            <input type="hidden" name="tab" value="0">
            <button class="uk-button uk-button-primary" type="submit">@trans('Save')</button>
            <a class="uk-button" href="@url('@system/system/index')">@trans('Close')</a>
        </p>

    </div>

</form>