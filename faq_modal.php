<div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="faqModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FAQs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol id="faqList">
                    <li class="faqQuestion">How is it that Gatekeeper doesn't need or keep my Password? Don’t you need
                        it to work?
                    </li>
                    <p class="faqAnswer">We authenticate you based on your device. You use your Master Password to only
                        decrypt your
                        own data locally on your computer, and your data is successfully decrypted only if you
                        provided the right one.
                    </p>

                    <li class="faqQuestion">What if Gatekeepers password gets hacked?</li>
                    <p class="faqAnswer">We take every precaution to keep our servers secure through 24x7 building
                        monitoring,
                        biometric entryways and armed guards. Your data is always encrypted with AES-256, with a
                        unique key for each user that isn't recorded anywhere. Without these keys, this encrypted
                        data is useless to anyone, even us.</p>

                    <li class="faqQuestion">Is my data safe in the cloud?</li>
                    <p class="faqAnswer">Absolutely safe. Our cloud holds only encrypted data, which is useless without
                        your unique
                        Master Password-derived key (because of the AES-256 encryption algorithm.) And we don't have
                        any record anywhere.</p>

                    <li class="faqQuestion">What if I forget my Master Password?</li>
                    <p class="faqAnswer">We never store your Password, your data is unrecoverable if you forget it – the
                        good news is,
                        now you only have one password to remember for all of your accounts so it should make it
                        easier for you to remember! Our users like the fact that this is the only way for us to
                        ensure that their data is inaccessible to anyone but them.</p>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>