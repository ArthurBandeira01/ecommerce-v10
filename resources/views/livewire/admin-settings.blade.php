<div>

    <div class="tab">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a wire:click.prevent='selectTab("general_settings")' class="nav-link {{ $tab == 'general_settings' ? 'active' : ''}}"
                data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">General settings</a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent='selectTab("logo_favicon")' class="nav-link {{ $tab == 'logo_favicon' ? 'active' : ''}}"
                data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo & Favicon</a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent='selectTab("social_networks")' class="nav-link {{ $tab == 'social_networks' ? 'active' : ''}}"
                data-toggle="tab" href="#social_networks" role="tab" aria-selected="false">Social networks</a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent='selectTab("payment_methods")' class="nav-link {{ $tab == 'payment_methods' ? 'active' : ''}}"
                data-toggle="tab" href="#payment_methods" role="tab" aria-selected="false">Payment methods</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade {{ $tab == 'general_settings' ? 'active show' : ''}}" id="general_settings" role="tabpanel">
                <div class="pd-20">
                    <form wire:submit.prevent = 'updateGeneralSettings()'>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter site name" wire:model.defer='site_name'>
                                    @error('site_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site email</b></label>
                                    <input type="text" class="form-control" placeholder="Enter site email" wire:model.defer='site_email'>
                                    @error('site_email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site phone</b></label>
                                    <input type="text" class="form-control" placeholder="Enter phone" wire:model.defer='site_phone'>
                                    @error('site_phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site meta keywords</b><small> Separated by comma (a, b, c)</small></label>
                                    <input type="text" class="form-control" placeholder="Enter site meta keywords" wire:model.defer='site_meta_keywords'>
                                    @error('site_meta_keywords')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Site meta description</label>
                            <textarea cols="4" rows="4" placeholder="Site meta desc..."
                            class="form-control" wire.model='site_meta_description'></textarea>
                            @error('site_meta_description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade {{ $tab == 'logo_favicon' ? 'active show' : ''}}" id="logo_favicon" role="tabpanel">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-3">Site logo</h5>
                            <form action="{{route('admin.change-logo')}}" method="POST" enctype="multipart/form-data" id="change_site_logo_form">
                                @csrf
                                <div class="mb-2">
                                    <input type="file" name="site_logo" id="site_logo" class="form-control" required>
                                    <span class="text-danger error-text site_logo_error"></span>
                                </div>
                                <button type="submit" class="btn btn-primary">Change logo</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Site favicon</h5>
                            <form action="{{route('admin.change-favicon')}}" method="POST" enctype="multipart/form-data"
                            id="change_site_favicon_form">
                                @csrf
                                <div class="mb-2">
                                    <input type="file" name="site_favicon" id="site_favicon" class="form-control" required>
                                    <span class="text-danger error-text site_logo_error"></span>
                                </div>
                                <button type="submit" class="btn btn-primary">Change favicon</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade {{ $tab == 'social_networks' ? 'active show' : ''}}" id="social_networks" role="tabpanel">
                <div class="pd-20">
                    <form wire:submit.prevent = 'updateSocialNetworks()'>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Facebook URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="facebook_url" placeholder="Enter Facebook URL">
                                    @error('facebook_url')
                                        <span class="text-danger">
                                            {{ $message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Twitter URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="twitter_url" placeholder="Enter Twitter URL">
                                    @error('twitter_url')
                                        <span class="text-danger">
                                            {{ $message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Instagram URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="instagram_url" placeholder="Enter Instagram URL">
                                    @error('instagram_url')
                                        <span class="text-danger">
                                            {{ $message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Youtube URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="youtube_url" placeholder="Enter Youtube URL">
                                    @error('youtube_url')
                                        <span class="text-danger">
                                            {{ $message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Github URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="github_url" placeholder="Enter Github URL">
                                    @error('github_url')
                                        <span class="text-danger">
                                            {{ $message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Linkedin URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="linkedin_url" placeholder="Enter Linkedin URL">
                                    @error('linkedin_url')
                                        <span class="text-danger">
                                            {{ $message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade {{ $tab == 'payment_methods' ? 'active show' : ''}}" id="payment_methods" role="tabpanel">
                <div class="pd-20">

                </div>
            </div>
        </div>
    </div>

</div>
