# Elementor Form Setup Guide

Follow these steps after activating the theme and installing Elementor Pro.

## General

1. Edit **Partner With Us** or **Join Us** in the WordPress admin.
2. Click **Edit with Elementor**.
3. In the right column content area, delete the placeholder paragraph block if present.
4. Add a **Form** widget (Elementor Pro).
5. Style is applied automatically via `assets/css/elementor-forms.css` when the form sits inside `.remotiq-form-panel` (provided by the page template).

## Partner With Us Form

| Field label | Field type | Required |
|-------------|------------|----------|
| Business Name | Text | Yes |
| Contact Person | Text | Yes |
| Email Address | Email | Yes |
| How can we help? | Textarea | Yes |

**Suggested form settings:**

- Submit button label: `Submit`
- Success message: `Thank you! We'll be in touch within 24 hours.`
- Actions: Email (to your team inbox), optional Webhook/CRM
- **Redirect after submit:** Form widget → **Actions After Submit** → add **Redirect** → URL of the **Partner With Us Thank You** page (slug `partner-with-us-thank-you`, template **Partner With Us Thank You**). Hide or clear the inline success message when using redirect.

## Join Us Form

| Field label | Field type | Required |
|-------------|------------|----------|
| Full Name | Text | Yes |
| Preferred Name | Text | Yes |
| Email Address | Email | Yes |
| Contact Number | Tel | Yes |
| Preferred Job Position | Text | No |
| Cover Letter | Upload | No |
| Resume | Upload | Yes |

**Upload field notes:**

- Enable **Allow File Uploads** in Elementor → Settings → Advanced
- Set allowed file types: `.pdf`, `.doc`, `.docx` (and `.txt` for cover letter if desired)
- Confirm hosting `upload_max_filesize` and `post_max_size` support your limits

**Suggested form settings:**

- Submit button label: `Submit Your Application`
- Actions: Email with file attachments, optional storage in Elementor Submissions
- **Redirect after submit:** Form widget → **Actions After Submit** → add **Redirect** → URL of the **Join Us Thank You** page (slug `join-us-thank-you`, template **Join Us Thank You**). Hide or clear the inline success message when using redirect.

### Partner With Us Thank You page

1. Create a page titled **Partner With Us Thank You** (or use the page created on theme activation).
2. Assign the **Partner With Us Thank You** page template under Page Attributes.
3. Publish and copy its permalink for the Elementor form redirect action above.

### Join Us Thank You page

1. Create a page titled **Join Us Thank You** (or use the page created on theme activation).
2. Assign the **Join Us Thank You** page template under Page Attributes.
3. Publish and copy its permalink for the Elementor form redirect action above.

## Email Actions

For each form, add an **Email** action:

1. Open the Form widget → **Actions After Submit**
2. Add **Email**
3. Set **To** to your team address
4. Include all fields in the email body
5. For Join Us, enable file attachments on the email action

## Styling Tips

The theme CSS targets:

- `.remotiq-form-panel .elementor-field-textual` — inputs
- `.remotiq-form-panel .elementor-button` — yellow submit button
- `.remotiq-form-panel .elementor-field-type-upload input[type="file"]` — dashed upload areas

If you rebuild the form outside the page template content area, wrap the Form widget in a section with CSS class `remotiq-form-panel`.

## Privacy Policy Link

Update the **Privacy Policy** page content under Pages → Privacy Policy. Footer and form disclaimer links resolve automatically once that page exists.
