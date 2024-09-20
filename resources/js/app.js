/* eslint-disable no-undef, no-underscore-dangle */
/* global Livewire, Alpine */
import './bootstrap'
import '../css/app.scss'
import { HSOverlay } from 'preline'

// fix responsive images
window.onload = () => {
    // Fix responsive images
    _.forEach(document.querySelectorAll('img[srcset]'), (img) => {
        window.requestAnimationFrame(() => {
            const size = img.getBoundingClientRect().width
            if (!size) return
            img.sizes = `${Math.ceil((size / window.innerWidth) * 100)}vw`
            img.setAttribute('srcset', img.getAttribute('srcset'))
            img.setAttribute('src', img.getAttribute('src'))
        })
    })

    // Move dialogs to the end of the body
    _.forEach(document.querySelectorAll('[data-move-to-body="true"]'), (dialog) => {
        document.body.appendChild(dialog)
    })

    Livewire.on(
        'closeModal',
        _.debounce((event) => {
            const modalData = _.head(event) // Access the first element in the array
            const modalId = _.get(modalData, 'modalId') // Get the modal ID

            if (modalId) {
                // Access the Alpine component's data using Alpine.$data
                const component = document.getElementById(modalId)
                const alpineData = Alpine.$data(component)

                // Set isSubmitting to false
                alpineData.isSubmitting = false

                // Close the modal
                HSOverlay.close(`#${modalId}`)
            }
        }, 300)
    ) // Debounce to prevent multiple triggers if needed
}
